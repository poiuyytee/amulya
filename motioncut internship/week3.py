import json
import os
from datetime import datetime

# Constants
EXPENSES_FILE = "expenses.json"

def load_expenses():
    """Load expense data from a JSON file."""
    if os.path.exists(EXPENSES_FILE):
        with open(EXPENSES_FILE, "r") as file:
            return json.load(file)
    else:
        return {"expenses": []}

def save_expenses(expenses):
    """Save expense data to a JSON file."""
    with open(EXPENSES_FILE, "w") as file:
        json.dump(expenses, file, indent=2)

def input_expense():
    """Allow the user to input a new expense."""
    amount = float(input("Enter the amount spent: "))
    description = input("Enter a brief description: ")
    category = input("Enter the expense category: ")
    date = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    return {"amount": amount, "description": description, "category": category, "date": date}

def categorize_expenses(expenses):
    """Categorize expenses into different categories."""
    categories = set(expense["category"] for expense in expenses["expenses"])
    return categories

def display_summary(expenses):
    """Display a summary of monthly expenses and category-wise expenditure."""
    # Extract relevant information from expenses
    total_amount = sum(expense["amount"] for expense in expenses["expenses"])
    categories = categorize_expenses(expenses)

    # Display the summary
    print(f"\nTotal Monthly Expenses: ${total_amount:.2f}")
    print("\nCategory-wise Expenditure:")
    for category in categories:
        category_total = sum(expense["amount"] for expense in expenses["expenses"] if expense["category"] == category)
        print(f"{category}: ${category_total:.2f}")

def main():
    # Load existing expenses
    expenses = load_expenses()

    while True:
        print("\nExpense Tracker Menu:")
        print("1. Add Expense")
        print("2. View Monthly Summary")
        print("3. Exit")

        choice = input("Enter your choice (1/2/3): ")

        if choice == "1":
            # Input a new expense
            new_expense = input_expense()
            expenses["expenses"].append(new_expense)
            save_expenses(expenses)
            print("Expense added successfully!")

        elif choice == "2":
            # View monthly summary
            display_summary(expenses)

        elif choice == "3":
            # Exit the program
            print("Exiting Expense Tracker. Goodbye!")
            break

        else:
            print("Invalid choice. Please enter 1, 2, or 3.")

if __name__ == "__main__":
    main()
