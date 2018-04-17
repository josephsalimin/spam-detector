# kmp.py

# Algorithm of KMP
class KMP:

	def generate_border(self, pat):
		# Total length for the lps
		length = len(pat) - 1
		# The length of the last prefix and suffix
		length_sp = 0 
		# Set first index to 0
		lps.append(0)
		# Loops until < length
		for i in range(1, length):
			# Check if character is the same
			if (pat[length_sp] == pat[i]):
				length_sp += 1
				lps.append(length_sp)
				continue
			# If not same then check if length_sp == 0
			# If yes then append then continue
			if length_sp > 0:
				length_sp -= 1
				i -= 1
			else:
				lps.append(0)
		# Return the result
		return lps

	def is_pattern_in_string(self, text, pat):
		txt_len = len(text) 	# menyimpan panjang text
		path_len = len(pat)	# menyimpan panjang pattern
		i, j = 0, 0				# iterator text and pattern
		lps = self.generateBorder(pat);
		match = False
		while(i < txt_len and not(match)):
			if(text[i] == pat[j]):
				# If the character is match, then concat i and j
				i += 1
				j += 1

				if (j == path_len):
					# kalau semua char pd pattern cocok pada text, berarti match
					match = True
			else:
				# kalau ga cocok
				if (j == 0):
					# kalau j == 0,  majukan i
					i = i + 1
				else:
					# kalau j != 0, ambil j menjadi panjang substring terpanjang pada j-1 					
					j = lps[j-1]
		return match

	def match_strings(self, input_text, pattern):
		result = [] 			# penyimpan hasil
		for text in input_text:
			# kalau pattern terdapat pada text
			if(self.is_pattern_in_string(text, pattern)):
				# append text ke result
				result.append(text)
		return result