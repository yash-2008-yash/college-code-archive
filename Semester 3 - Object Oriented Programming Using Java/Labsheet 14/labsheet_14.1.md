# Experiment 14.1 - Sort the Scores

Varun is developing an application to manage a list of exam scores. He wants to sort the scores in ascending order and display the sorted list. Write a Java program using `ArrayList` to help Varun implement this functionality.

---

### Input Format

- The user will enter exam scores as integers, one per line. Entering a negative integer indicates the end of input.

### Output Format

- Print the sorted list of scores in ascending order, with each score separated by a space on a single line.

**Note:**

- Do not print a trailing space after the last score.

### Example

```
14
15
17
12
13
11
-8

11 12 13 14 15 17
```

```
24
82
15
34
29
-7

15 24 29 34 82
```

---

### Solution Code

```java
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class ExamScoreManager {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);

		// ArrayList to store the exam scores (it grows automatically, so no size is needed up front)
		ArrayList<Integer> examScores = new ArrayList<>();

		// keep reading scores until a negative number is entered
		while (true) {
			int score = scanner.nextInt();   // read one score

			// a negative number is the signal to stop reading input
			if (score < 0) {
				break;   // leave the loop; the negative number is NOT added to the list
			}

			examScores.add(score);   // store the valid score in the list
		}

		// Collections.sort() arranges the list in ascending order (smallest to largest)
		Collections.sort(examScores);

		// print the sorted scores on a single line, separated by spaces
		for (int i = 0; i < examScores.size(); i++) {
			// print a space BEFORE every score except the first one,
			// so there is no trailing space after the last score
			if (i > 0) {
				System.out.print(" ");
			}
			System.out.print(examScores.get(i));   // get(i) returns the score at position i
		}
	}
}
```