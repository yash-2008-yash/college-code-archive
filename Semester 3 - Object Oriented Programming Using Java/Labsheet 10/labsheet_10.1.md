# Experiment 10.1 - Student Grade Calculator

Write a Java program to read student scores from a file and calculate the average score of a specified student using nested exception handling. Handle both checked and unchecked exceptions appropriately.

The program should perform the following tasks:

1. Read the file name containing the student score records.
2. If the entered file name contains 0, print the following statement and terminate the program.

```
Cannot calculate average
```

3. Otherwise, read the student records from the specified file.
4. Read a student index and calculate the average score of that student.
5. Use nested try-catch blocks to handle exceptions at different levels:
   - Handle file-related exceptions while opening and reading the file.
   - Handle runtime exceptions while accessing the student record.

Assume that the input file is available in the current working directory.

The file `students.txt` contains the student records in the following format:

- The first line contains an integer N, representing the number of students.
- The second line contains an integer M, representing the number of scores for each student.
- The next N lines each contain M space-separated integers representing the scores of a student.

For example, the contents of `students.txt` are:

```
3
4
80 85 90 95
70 75 80 85
60 65 70 75
```

---

### Input Format

- The first line contains the name of the file containing the student records.
- If the file name is 0 or the specified file cannot be opened, no further input is provided.
- Otherwise, the second line contains an integer representing the zero-based student index.

### Output Format

- If the input file name is 0, print:

```
Cannot calculate average
```

- If the specified file cannot be opened, print:

```
File not found
```

- If the student index is invalid, print:

```
Student not found
```

- Otherwise, print:

```
Average: <average>
```

where `<average>` is displayed with two digits after the decimal point.

**Note:**

- The student index is zero-based.
- Refer to the visible test cases for the exact input and output format.

### Example

```
student.txt

File not found
```

```
students.txt
0

Average: 87.50
```

```
students.txt
5

Student not found
```

```
0

Cannot calculate average
```

---

### Solution Code

```java
import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class StudentGradeCalculator {
	public static void main(String[] args) {
		// Scanner for keyboard input (file name and student index)
		Scanner input = new Scanner(System.in);

		// First line of input: name of the file that holds the student records
		String fileName = input.nextLine();

		// Special case: if the user types "0", stop immediately
		if (fileName.equals("0")) {
			System.out.println("Cannot calculate average");
			input.close();   // close the keyboard Scanner before leaving
			return;          // terminate main() so nothing else runs
		}

		// ---------- OUTER try: handles file-related (checked) exception ----------
		try {
			// Open the file for reading; throws FileNotFoundException (checked) if it doesn't exist
			Scanner fileScanner = new Scanner(new File(fileName));

			// Read the zero-based student index from the keyboard
			// trim() removes extra spaces so parseInt() doesn't fail
			int studentIndex = Integer.parseInt(input.nextLine().trim());

			// First two lines of the file: N = number of students, M = scores per student
			int n = Integer.parseInt(fileScanner.nextLine().trim());
			int m = Integer.parseInt(fileScanner.nextLine().trim());

			// 2D array: scores[i][j] = j-th score of the i-th student
			int[][] scores = new int[n][m];

			// Read the next N lines, one line per student
			for (int i = 0; i < n; i++) {
				// split("\\s+") breaks the line at one or more spaces, e.g. "80 85 90 95" -> ["80","85","90","95"]
				String[] parts = fileScanner.nextLine().trim().split("\\s+");

				// Convert each score from String to int and store it
				for (int j = 0; j < m; j++) {
					scores[i][j] = Integer.parseInt(parts[j]);
				}
			}

			// ---------- INNER try: handles runtime (unchecked) exception ----------
			try {
				// Add up all M scores of the chosen student
				int sum = 0;
				for (int j = 0; j < m; j++) {
					// invalid studentIndex (negative or >= n) throws ArrayIndexOutOfBoundsException here
					sum += scores[studentIndex][j];
				}

				// (double) cast avoids integer division, so 350 / 4 gives 87.5 and not 87
				double average = (double) sum / m;

				// %.2f prints exactly two digits after the decimal point, %n is a new line
				System.out.printf("Average: %.2f%n", average);

			} catch (RuntimeException e) {
				// ArrayIndexOutOfBoundsException is a RuntimeException,
				// so an invalid student index ends up here
				System.out.println("Student not found");
			}

			// Done with the file, release the resource
			fileScanner.close();

		} catch (FileNotFoundException e) {
			// runs when the given file name does not exist in the working directory
			System.out.println("File not found");
		}

		// Close the keyboard Scanner at the end of the program
		input.close();
	}
}
```