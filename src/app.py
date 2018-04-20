from flask import Flask, request, jsonify, session, redirect, url_for
from filter_algorithm import FilterMethod
import json


app = Flask(__name__)
app.config['DEBUG'] = True


@app.route('/tweepy', methods=['POST', 'GET'])
def request_tweepy():
	# Test
	print("I'm in!")

	if (request.method == 'POST'):
		datas = request.data
	else:
		error = {'Result': 'Error Not Found'}
		return jsonify(error)

	json_data = json.loads(datas)

	filtered_msg = FilterMethod.do_filter(json_data)
	result =  {
		'response':filtered_msg,
		'status': 500
	}
	return jsonify(result)


@app.route('/')
def index():
	return redirect(url_for('request_tweepy'), code=307)


if __name__ == '__main__':
	app.run(host='0.0.0.0', port=4040)