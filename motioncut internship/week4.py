import random
import string

def generate_password(length=12):
    """Generate a random password."""
    characters = string.ascii_letters + string.digits + string.punctuation
    password = ''.join(random.choice(characters) for _ in range(length))
    return password

def get_user_input():
    """Prompt the user for password length and quantity."""
    length = int(input("Enter the desired password length: "))
    quantity = int(input("Enter the number of passwords to generate: "))
    return length, quantity

def main():
    print("Welcome to the Password Generator!")

    while True:
        length, quantity = get_user_input()

        if length <= 0 or quantity <= 0:
            print("Invalid input. Length and quantity must be positive integers.")
            continue

        print("\nGenerated Passwords:")
        for _ in range(quantity):
            password = generate_password(length)
            print(password)

        another_round = input("\nDo you want to generate more passwords? (yes/no): ").lower()
        if another_round != 'yes':
            print("Thank you for using the Password Generator. Goodbye!")
            break

if __name__ == "__main__":
    main()
