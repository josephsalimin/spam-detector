# kmp.py

# Algorithm of KMP
class KMP:

	@classmethod
	def generate_border(cls, pat):
		# Total length for the lps
		length = len(pat) - 1
		# The length of the last prefix and suffix
		length_sp = 0 
		# Set first index to 0
		lps = []
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

	@classmethod
	def is_pattern_in_string(cls, text, pat):
		txt_len = len(text) 	# Save length of text
		path_len = len(pat)		# Save length of pattern
		i, j = 0, 0				# iterator text and pattern
		lps = []
		lps = cls.generate_border(pat);
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

	@classmethod
	def match_string(cls, input_text, pattern):
		# The result
		result =  {
			"string" : input_text, 
			"is_match" : cls.is_pattern_in_string(input_text.lower(), pattern)
		}
		return result