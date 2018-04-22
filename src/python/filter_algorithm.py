from booyer_moore import BooyerMoore
from kmp import KMP
from regex import Regex


class FilterMethod:

	@staticmethod
	def do_kmp(spam_text, data_resp):
		results = []

		for data in data_resp:
			text = data['text']
			result = KMP.match_string(text, spam_text)
			result['profile_img'] = data['profile_img']
			result['name'] = data['name']
			result['screen_name'] = data['screen_name']
			results.append(result)

		return results

	@staticmethod
	def do_booyer(spam_text, data_resp):
		results = []

		for data in data_resp:
			text = data['text']
			result = BooyerMoore.match_string(text, spam_text)
			result['profile_img'] = data['profile_img']
			result['name'] = data['name']
			result['screen_name'] = data['screen_name']
			results.append(result)

		return results

	@staticmethod
	def do_regex(spam_text, data_resp):
		results = []

		for data in data_resp:
			text = data['text']
			result = Regex.match_string(text, spam_text)
			result['profile_img'] = data['profile_img']
			result['name'] = data['name']
			result['screen_name'] = data['screen_name']
			results.append(result)

		return results


	@classmethod
	def do_filter(cls, datas):
		spam_text = datas['spam_text']
		method = datas['method']
		data_resp = datas['response']

		if method == 'KMP':
			filtered_msg = cls.do_kmp(spam_text, data_resp)
		elif method == 'Booyer-Moore':
			filtered_msg = cls.do_booyer(spam_text, data_resp)
		else:
			filtered_msg = cls.do_regex(spam_text, data_resp)

		print(filtered_msg)

		return filtered_msg
