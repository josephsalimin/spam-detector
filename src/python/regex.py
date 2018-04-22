import re

class Regex:

	@classmethod
	def generate_pattern(cls, pat):
		pat_split = (pat.lower()).split(" ")
		pattern = ""

		# Generate pattern from keyword
		# by replacing empty space with '*'
		# and insert * on both start and end of keyword
		for i in range(len(pat_split)):
			pattern += (".*" + pat_split[i])
		pattern += ".*"

		# Compile pattern into regex pattern
		# print(pattern)
		regex_pattern = re.compile(pattern)
		return regex_pattern

	@classmethod
	def is_pattern_in_string(cls, text, pat):
		pattern = cls.generate_pattern(pat)
		text_split = text.split("\n")
		string = ""
		for item in text_split:
			string += item
		result = pattern.match(string)
		if result != None :
			return True
		else:
			return False

	@classmethod
	def match_string(cls, string, pat):
		result = {
			"string" : string,
			"is_match" : cls.is_pattern_in_string(string.lower(), pat)
		}
		return result