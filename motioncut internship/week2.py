# Week 2 Project: Word Counter

# Function to count words in a given text
def count_words(text):
    # Split the text into words using whitespace as the separator
    words = text.split()

    # Return the count of words
    return len(words)

# Function for user input handling
def get_user_input():
    # Prompt the user to enter a sentence or paragraph
    user_input = input("Enter a sentence or paragraph: ")
    return user_input

# Function for displaying the word count
def display_word_count(word_count):
    # Display the word count to the console
    print(f"Word count: {word_count}")

# Main function to orchestrate the program
def main():
    # Prompt user for input
    user_text = get_user_input()

    # Check for empty input
    if not user_text.strip():
        print("Error: Empty input. Please enter a valid text.")
        return

    # Count words
    word_count = count_words(user_text)

    # Display the result
    display_word_count(word_count)

# Run the program
if __name__ == "__main__":
    main()

