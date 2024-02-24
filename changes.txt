M .Amulya
Making Changes in client3.py - getDataPoint Method:
Modify the computation of the price using the formula: (bid_price + ask_price) / 2.
Do not change the return value as it represents the entire data point.
python
Copy code
# Existing code
price = data[3]

# Updated code
price = (data[1] + data[2]) / 2
Making Changes in client3.py – getRatio Method:
Change the return value to the ratio of stock price_a to stock price_b.
Add a condition to handle the case where price_b could be zero (division by zero).
python
Copy code
# Existing code
return 1

# Updated code
if prices["stock_b"] != 0:
    return prices["stock_a"] / prices["stock_b"]
else:
    return 0  # Or handle this case appropriately
Making Changes in client3.py - Main Method:
Store the datapoints obtained from the getDataPoint method in a dictionary named prices.
Use the prices dictionary to pass the right values to the getRatio function.
python
Copy code
# Existing code
for i in range(10):
    data = getDataPoint()
    print("Stock:", data[0])
    print("Bid Price:", data[1])
    print("Ask Price:", data[2])
    print("Price:", data[3])
    print("Ratio:", getRatio())
    print("-----------------------")

# Updated code
prices = {}
for i in range(10):
    data = getDataPoint()
    prices[data[0]] = data[3]  # Store stock prices in the dictionary
    print("Stock:", data[0])
    print("Bid Price:", data[1])
    print("Ask Price:", data[2])
    print("Price:", data[3])
    print("Ratio:", getRatio(prices))
    print("-----------------------")
Scenario 1: You only made one commit for all the required changes
Open a terminal and navigate to the repository using the cd <repo_name_here> command.
Run the following command to generate a patch file for your last commit:
bash
Copy code
git format-patch -1 HEAD
This command will create a .patch file in the directory where you executed it. You will upload this file as your submission for the task.
Scenario 2: You made multiple commits for all the required changes
Open a terminal and navigate to the repository using the cd <repo_name_here> command.
Run the following command to generate a patch file for the specified number of commits (replace <number_of_commits> with the actual number of commits you made):
bash
Copy code
git format-patch -<number_of_commits> --stdout > multi_commit.patch
Example (if you made 4 commits):
bash
Copy code
git format-patch -4 --stdout > multi_commit.patch
This command will create a .patch file in the directory where you executed it. You will upload this file as your submission for the task.
