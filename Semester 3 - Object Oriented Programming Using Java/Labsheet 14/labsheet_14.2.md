# Experiment 14.2 - Index of Element in TreeSet

Write a Java program that stores a set of string elements in a TreeSet and finds the 0-based index of a given target element in the lexicographic sorted order of the TreeSet.

---

### Input Format

- The first line contains space-separated strings representing the elements to be added to the TreeSet.
- The second line contains a single string representing the target element whose index needs to be found.

### Output Format

- Print a single integer representing the 0-based index of the target element.
- If the target element is not present in the TreeSet, print "Element not found".

### Example

```
apple banana cherry banana cherry
banana

1
```

```
1 2 3 1 2 3
33

Element not found
```

---

### Solution Code

```java
import java.util.Scanner;
import java.util.TreeSet;

public class FirstOccurrence {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);

		// read the first line and split it at every space into an array of words
		String[] elements = scanner.nextLine().split(" ");

		// TreeSet keeps its elements sorted (alphabetical order for Strings) and removes duplicates automatically
		TreeSet<String> treeSet = new TreeSet<>();

		// second line: the element whose index we have to find
		String target = scanner.nextLine();

		// add every word to the TreeSet
		// duplicates are ignored, e.g. "apple banana cherry banana cherry" -> [apple, banana, cherry]
		for (String element : elements) {
			treeSet.add(element);
		}

		// first check whether the target exists in the set
		if (treeSet.contains(target)) {
			int index = 0;   // counts how many elements come BEFORE the target

			// TreeSet has no get(index) method, so walk through it in sorted order
			for (String element : treeSet) {
				if (element.equals(target)) {
					break;   // found the target, so index now holds its 0-based position
				}
				index++;     // not the target yet, so move to the next position
			}

			System.out.println(index);
		} else {
			// target was never added to the set
			System.out.println("Element not found");
		}

		scanner.close();
	}
}
```