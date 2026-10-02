# Experiment 9.1 - Handle Exceptions

Implement a Java program that demonstrates the use of predefined exception handling mechanisms. The program should handle three types of exceptions: `ArrayIndexOutOfBoundsException`, `NumberFormatException`, and `ArithmeticException`.

The program performs the following steps:

- Prompts the user to enter the size of an integer array and then an index to access an element. If the index is invalid, it should catch an `ArrayIndexOutOfBoundsException`.
- Prompts the user to enter a number as a string. It attempts to convert the string to an integer. If the format is invalid, it should catch a `NumberFormatException`.
- Prompts the user for a numerator and a denominator. It attempts to perform division and catches an `ArithmeticException` if division by zero occurs.

---

### Input Format

- Print: "Size of the array: " → Input: an integer representing the array size.
- Print: "Index: " → Input: an integer representing the index to access.
- Print: "Number as string: " → Input: a string to be parsed as an integer.
- Print: "Numerator: " → Input: an integer value.
- Print: "Denominator: " → Input: an integer value.

### Output Format

- If the index is valid, print the array element at the given index.
- If the index is invalid, print:

```
ArrayIndexOutOfBoundsException: Invalid index entered.
```

- If the string is a valid number, print:

```
Parsed number: <parsed_number>
```

- If the string is invalid, print:

```
NumberFormatException: Invalid number format.
```

- If the division is successful, print:

```
Result: <result>
```

- If division by zero occurs, print:

```
ArithmeticException: Division by zero or invalid arithmetic operation.
```

### Example

```
Size of the array: 5
Index: 6
ArrayIndexOutOfBoundsException: Invalid index entered.
Number as string: abc
NumberFormatException: Invalid number format.
Numerator: 10
Denominator: 0
ArithmeticException: Division by zero or invalid arithmetic operation.
```

```
Size of the array: 5
Index: 3
0
Number as string: 20
Parsed number: 20
Numerator: 20
Denominator: 5
Result: 4.0
```

---

### Solution Code

```java
import java.util.Scanner;

public class Main {
	public static void main(String[] args) {
		// Scanner object to read user input from the keyboard
		Scanner scanner = new Scanner(System.in);

		// ---------- PART 1: ArrayIndexOutOfBoundsException ----------
		try {
			System.out.print("Size of the array: ");
			int size = scanner.nextInt();          // read the array size
			int[] numbers = new int[size];         // create an int array of that size (all elements default to 0)

			System.out.print("Index: ");
			int index = scanner.nextInt();         // read the index the user wants to access
			System.out.println(numbers[index]);    // throws ArrayIndexOutOfBoundsException if index < 0 or >= size

		} catch (ArrayIndexOutOfBoundsException e) {
			// runs only when the index is outside the array range
			System.out.println("ArrayIndexOutOfBoundsException: Invalid index entered.");
		} catch (NumberFormatException e) {
			// extra catch block present in the given solution
			System.out.println("NumberFormatException: Invalid number format.");
		} finally {
			// finally always runs; nextInt() leaves the newline in the buffer,
			// so this consumes it and lets the nextLine() below read the real input
			scanner.nextLine();
		}

		// ---------- PART 2: NumberFormatException ----------
		try {
			System.out.print("Number as string: ");
			String input = scanner.nextLine();           // read the whole line as a String
			int number = Integer.parseInt(input);        // converts String to int; throws NumberFormatException for input like "abc"
			System.out.println("Parsed number: " + number);

		} catch (NumberFormatException e) {
			// runs only when the string is not a valid integer
			System.out.println("NumberFormatException: Invalid number format.");
		}

		// ---------- PART 3: ArithmeticException ----------
		try {
			System.out.print("Numerator: ");
			int numerator = scanner.nextInt();           // read the numerator
			System.out.print("Denominator: ");
			int denominator = scanner.nextInt();         // read the denominator

			// integer division: throws ArithmeticException when denominator is 0
			// (the result is then stored in a double, e.g. 20 / 5 prints 4.0)
			double result = numerator / denominator;
			System.out.println("Result: " + result);

		} catch (ArithmeticException e) {
			// runs only for division by zero
			System.out.println("ArithmeticException: Division by zero or invalid arithmetic operation.");
		} finally {
			// always runs, so the Scanner gets closed whether or not an exception occurred
			scanner.close();
		}
	}
}
```