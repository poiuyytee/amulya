import random

def display_question(question, options):
    print(question)
    for i, option in enumerate(options, start=1):
        print(f"{i}. {option}")
    return int(input("Your answer: "))

def evaluate_answer(user_answer, correct_answer, score):
    if user_answer == correct_answer:
        print("Correct!")
        return score + 1
    else:
        print(f"Incorrect. The correct answer is {correct_answer}.")
        return score

def run_quiz():
    questions = [
        {"question": "Which planet is known as the Red Planet?", "options": ["Earth", "Mars", "Jupiter"], "correct_answer": 2},
        {"question": "Who wrote 'Romeo and Juliet'?", "options": ["Charles Dickens", "William Shakespeare", "Jane Austen"], "correct_answer": 2},
        {"question": "What is the main ingredient in guacamole?", "options": ["Tomato", "Avocado", "Onion"], "correct_answer": 2},
    ]

    score = 0

    for question_data in questions:
        user_answer = display_question(question_data["question"], question_data["options"])
        score = evaluate_answer(user_answer, question_data["correct_answer"], score)
        print()

    print(f"Your final score is {score}/{len(questions)}.")

if __name__ == "__main__":
    run_quiz()
