
# The Algorithm of Booyer Moore. All hail Booyer Mooer!
class BooyerMoore:

	@classmethod
	def generate_last_occurence(cls, pat):
		# lo is last occurence
		lo = dict()
		# Get the length of the pat
		length = len(pat)
		# Get the last occurence
		for idx in range(length):
			lo[pat[idx]] = idx
		# Return it
		return lo

	@classmethod
	def is_pattern_in_string(cls, text, pat):
		# Initialization
		# Length
		pat_len = len(pat)
		txt_len = len(text)
		# Index
		idx_pat, idx_txt = pat_len - 1, pat_len - 1
		lo = cls.generate_last_occurence(pat)
		# Algorithm
		while  idx_txt < txt_len:
			# Check the occurence in pattern
			while (idx_pat > 0):
				if (text[idx_txt] != pat[idx_pat]):
					break
				idx_txt -= 1
				idx_pat -= 1
			# Check if idx_path is 0, If yes then return True becuase it is found
			if idx_pat == 0:
				return True
			# Case 3
			if text[idx_txt] not in pat:
				idx_txt += pat_len
				idx_pat = pat_len - 1
				continue
			# Case 1
			if cls.is_left(idx_pat, pat, text[idx_txt]):
				offset = pat_len - lo[text[idx_txt]] - 1
			# Case 2
			else:
				offset = pat_len - idx_pat 
			# Set the idx_txt and idx_pat
			idx_txt += offset
			idx_pat = pat_len - 1
		# Fail to find
		return False

	@classmethod
	def match_string(cls, string, pat):
		result =  {
			"string" : string, 
			"is_match" : cls.is_pattern_in_string(string, pat)
		}
		return result

	@staticmethod
	def is_left(idx, pat, char):
		# Iterate the pattern
		for i in range(len(pat)):
			if (char == pat[i]):
				break
		# Left Side?
		if i < idx:
			return True
		return False