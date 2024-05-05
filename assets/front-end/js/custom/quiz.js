var quiz = {
	JS: [
		{
			id: 1,
			question: "Hitunglah hasil dari 3^4 - 2^5",
			options: [
				{
					a: "5",
					b: "177777777777777777777777777777777777777777777777177777777777777777777777777777777777777777777777177777777777777777777777777777777777777777777777",
					c: "25",
					d: "31",
				},
			],
			answer:
				"177777777777777777777777777777777777777777777777177777777777777777777777777777777777777777777777177777777777777777777777777777777777777777777777",
			score: 0,
			status: "",
		},
		{
			id: 2,
			question: "Jika a = 4 dan b = 7, berapakah nilai dari a^2 + 3b?",
			options: [
				{
					a: "25",
					b: "35",
					c: "42",
					d: "49",
				},
			],
			answer: "49",
			score: 0,
			status: "",
		},
		{
			id: 3,
			question:
				"Sebuah segitiga memiliki panjang sisi a = 8, b = 15, dan c = 17. Apakah segitiga tersebut merupakan segitiga siku-siku?",
			options: [
				{
					a: "Ya",
					b: "Tidak",
				},
			],
			answer: "Ya",
			score: 0,
			status: "",
		},
		{
			id: 4,
			question: "Hasil dari operasi (2 + 3) x (6 - 4) adalah:",
			options: [
				{
					a: "5",
					b: "10",
					c: "12",
					d: "20",
				},
			],
			answer: "5",
			score: 0,
			status: "",
		},
		{
			id: 5,
			question: "Jika log base 2 dari x adalah 4, berapakah nilai dari x?",
			options: [
				{
					a: "2",
					b: "4",
					c: "8",
					d: "16",
				},
			],
			answer: "16",
			score: 0,
			status: "",
		},
		{
			id: 6,
			question:
				"Persamaan kuadrat 2x^2 - 5x + 2 = 0 memiliki akar-akar real berikut, kecuali:",
			options: [
				{
					a: "2",
					b: "0.5",
					c: "-1",
					d: "-2",
				},
			],
			answer: "0.5",
			score: 0,
			status: "",
		},
		{
			id: 7,
			question: "Berapakah hasil dari 1/3 + 0.25?",
			options: [
				{
					a: "0.5",
					b: "0.583",
					c: "0.666",
					d: "0.75",
				},
			],
			answer: "0.75",
			score: 0,
			status: "",
		},
		{
			id: 8,
			question: "Jika sin(θ) = 0.8, berapakah nilai dari cos(θ)?",
			options: [
				{
					a: "0.2",
					b: "0.4",
					c: "0.6",
					d: "0.8",
				},
			],
			answer: "0.2",
			score: 0,
			status: "",
		},
		{
			id: 9,
			question: "Berapakah hasil dari 5! (faktorial 5)?",
			options: [
				{
					a: "20",
					b: "60",
					c: "120",
					d: "150",
				},
			],
			answer: "120",
			score: 0,
			status: "",
		},
		{
			id: 10,
			question:
				"Jika m adalah bilangan genap dan n adalah bilangan ganjil, berapakah hasil dari m + n?",
			options: [
				{
					a: "Ganjil",
					b: "Genap",
					c: "Tergantung nilai m dan n",
					d: "Prima",
				},
			],
			answer: "Ganjil",
			score: 0,
			status: "",
		},
	],
};

var quizApp = function () {
	this.score = 0;
	this.qno = 1;
	this.currentque = 0;
	var totalque = quiz.JS.length;
	this.displayQuiz = function (cque) {
		this.currentque = cque;
		if (this.currentque < totalque) {
			$("#tque").html(totalque);
			$("#previous").attr("disabled", false);
			$("#next").attr("disabled", false);
			$("#qid").html(quiz.JS[this.currentque].id + ".");
			$("#question").html(quiz.JS[this.currentque].question);
			$("#question-options").html("");
			for (var key in quiz.JS[this.currentque].options[0]) {
				if (quiz.JS[this.currentque].options[0].hasOwnProperty(key)) {
					$("#question-options").append(
						"<div class='form-check option-block'>" +
							"<label class='form-check-label'>" +
							"<input type='radio' class='form-check-input' name='option' id='q" +
							key +
							"' value='" +
							quiz.JS[this.currentque].options[0][key] +
							"'><span id='optionval'>" +
							quiz.JS[this.currentque].options[0][key] +
							"</span></label>"
					);
				}
			}
		}

		if (this.currentque <= 0) {
			$("#previous").attr("disabled", true);
		}
		if (this.currentque >= totalque) {
			$("#next").attr("disabled", true);
			for (var i = 0; i < totalque; i++) {
				this.score = this.score + quiz.JS[i].score;
			}
			return this.showResult(this.score);
		}
	};

	this.showResult = function (scr) {
		$("#result").addClass("result");
		$("#result").html(
			"<center><button><a class='btn-back-quiz' href='<?= base_url('home') ?>' ><i class='fas fa-home'></i> Back Home</a></button></center>" +
				"<h1 class='res-header'>Total Score : &nbsp;" +
				scr +
				"/" +
				totalque +
				"</h1>"
		);
		for (var j = 0; j < totalque; j++) {
			var res;
			if (quiz.JS[j].score == 0) {
				res =
					'<span class="wrong">' +
					quiz.JS[j].score +
					'</span><i class="fa fa-remove c-wrong"></i>';
			} else {
				res =
					'<span class="correct">' +
					quiz.JS[j].score +
					'</span><i class="fa fa-check c-correct"></i>';
			}
			$("#result").append(
				'<div class="result-question"><span>' +
					quiz.JS[j].id +
					"</span> &nbsp;" +
					quiz.JS[j].question +
					"</div>" +
					"<div class='jawaban-quiz'>Correct answer : &nbsp;" +
					quiz.JS[j].answer +
					"</div>" +
					'<div class="last-row score-quiz">Score : &nbsp;' +
					res +
					"</div>"
			);
		}
	};

	this.checkAnswer = function (option) {
		var answer = quiz.JS[this.currentque].answer;
		option = option.replace(/</g, "&lt;"); //for <
		option = option.replace(/>/g, "&gt;"); //for >
		option = option.replace(/"/g, "&quot;");
		if (option == quiz.JS[this.currentque].answer) {
			if (quiz.JS[this.currentque].score == "") {
				quiz.JS[this.currentque].score = 1;
				quiz.JS[this.currentque].status = "correct";
			}
		} else {
			quiz.JS[this.currentque].status = "wrong";
		}
	};
	this.changeQuestion = function (cque) {
		this.currentque = this.currentque + cque;
		this.displayQuiz(this.currentque);
	};
};

var jsq = new quizApp();
var selectedopt;
$(document).ready(function () {
	jsq.displayQuiz(0);
	$("#question-options").on(
		"change",
		"input[type=radio][name=option]",
		function (e) {
			//var radio = $(this).find('input:radio');
			$(this).prop("checked", true);
			selectedopt = $(this).val();
		}
	);
});

$("#next").click(function (e) {
	e.preventDefault();
	if (selectedopt) {
		jsq.checkAnswer(selectedopt);
	}
	jsq.changeQuestion(1);
});
$("#previous").click(function (e) {
	e.preventDefault();
	if (selectedopt) {
		jsq.checkAnswer(selectedopt);
	}
	jsq.changeQuestion(-1);
});
