# Experiment 14.3 - Student Marks Management System (HashMap)

Write a Java program that demonstrates the use of HashMap by implementing a Student Marks Management System. A school wants to maintain a simple system to store and manage students' marks for a subject. Each student is uniquely identified by a Roll Number, and the corresponding marks are stored as an integer value.

To efficiently manage student records, the system should use a `HashMap`, where:

- Key → Roll Number
- Value → Marks

The system should support the following operations:

- Add or update a student's marks.
- View marks using a roll number.
- Remove a student's record.
- Display all student records.
- Display the total number of students.

The program should repeatedly display the following menu until the user chooses to exit:

```
Student Marks Management System
1. Add/Update Student Marks
2. View Marks by Roll Number
3. Remove Student Record
4. Display All Student Records
5. Count Total Students
6. Exit
```

When the user selects:

- Option 1, read a roll number and marks, then add or update the record.
- Option 2, read a roll number and display the corresponding marks.
- Option 3, read a roll number and remove the corresponding record if it exists.
- Option 4, display all student records.
- Option 5, display the total number of students.
- Option 6, terminate the program.

---

### Input Format

The input consists of a sequence of menu choices and corresponding data. Each menu choice is represented by an integer:

```
1 → Add/Update Student Marks
2 → View Marks by Roll Number
3 → Remove Student Record
4 → Display All Student Records
5 → Count Total Students
6 → Exit
```

1. If the user selects 1, the next inputs are:
   - An integer representing the Roll Number.
   - An integer representing the Marks.
2. If the user selects 2, the next input is:
   - An integer representing the Roll Number.
3. If the user selects 3, the next input is:
   - An integer representing the Roll Number.
4. If the user selects 4, no additional input is required.
5. If the user selects 5, no additional input is required.
6. The sequence continues until the user selects 6.

### Output Format

- For adding or updating a record:

```
Record saved for Roll No: <roll_number>
```

- For viewing marks:

```
Marks for Roll No <roll_number>: <marks>
```

- If the roll number does not exist:

```
Student record not found
```

- For removing a record:

```
Record removed for Roll No: <roll_number>
```

- If the roll number does not exist:

```
Student record not found
```

- For displaying all records:

```
Student Records:
Roll No: <roll_number>, Marks: <marks>
...
```

- If no records are available:

```
No student records available
```

- For displaying the total count:

```
Total Students: <count>
```

- For exiting:

```
Exiting
```

**Note:** Complete the implementation of the methods `addOrUpdateStudent()`, `getMarks()`, `removeStudent()`.

### Example

The menu is printed again before every input. This first example shows the complete output once:

```
Student Marks Management System
1. Add/Update Student Marks
2. View Marks by Roll Number
3. Remove Student Record
4. Display All Student Records
5. Count Total Students
6. Exit
4
No student records available
Student Marks Management System
1. Add/Update Student Marks
2. View Marks by Roll Number
3. Remove Student Record
4. Display All Student Records
5. Count Total Students
6. Exit
5
Total Students: 0
Student Marks Management System
1. Add/Update Student Marks
2. View Marks by Roll Number
3. Remove Student Record
4. Display All Student Records
5. Count Total Students
6. Exit
6
Exiting
```

In the next two examples, the repeated menu is left out and only the messages are shown.

```
1
101
94
1
102
88
2
101
2
103
4
5
1
101
96
2
101
3
102
4
5
3
999
6

Record saved for Roll No: 101
Record saved for Roll No: 102
Marks for Roll No 101: 94
Student record not found
Student Records:
Roll No: 101, Marks: 94
Roll No: 102, Marks: 88
Total Students: 2
Record saved for Roll No: 101
Marks for Roll No 101: 96
Record removed for Roll No: 102
Student Records:
Roll No: 101, Marks: 96
Total Students: 1
Student record not found
Exiting
```

```
1
501
67
1
502
89
1
503
92
4
2
502
3
501
3
999
1
501
75
2
501
4
5
6

Record saved for Roll No: 501
Record saved for Roll No: 502
Record saved for Roll No: 503
Student Records:
Roll No: 501, Marks: 67
Roll No: 502, Marks: 89
Roll No: 503, Marks: 92
Marks for Roll No 502: 89
Record removed for Roll No: 501
Student record not found
Record saved for Roll No: 501
Marks for Roll No 501: 75
Student Records:
Roll No: 501, Marks: 75
Roll No: 502, Marks: 89
Roll No: 503, Marks: 92
Total Students: 3
Exiting
```

---

### Solution Code

```java
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

public class StudentMarksManagementSystem {

	// Adds a new student or updates the marks if the roll number already exists
	public static void addOrUpdateStudent(
			HashMap<Integer, Integer> students,
			int rollNo,
			int marks
	) {
		// put() inserts a new key-value pair; if the key (roll number) already exists,
		// put() simply replaces the old marks with the new marks
		students.put(rollNo, marks);
	}

	// Returns the marks of a student, or null if the roll number is not present
	public static Integer getMarks(
			HashMap<Integer, Integer> students,
			int rollNo
	) {
		// get() returns the value for the key, or null when the key is missing
		// (return type is Integer, not int, because int cannot hold null)
		return students.get(rollNo);
	}

	// Removes a student record; returns true if removed, false if the roll number did not exist
	public static boolean removeStudent(
			HashMap<Integer, Integer> students,
			int rollNo
	) {
		// containsKey() checks whether this roll number is stored in the map
		if (students.containsKey(rollNo)) {
			students.remove(rollNo);   // delete the key and its marks
			return true;               // removal was successful
		}

		return false;                  // roll number not found, nothing removed
	}

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);

		// HashMap: key = roll number, value = marks
		HashMap<Integer, Integer> students = new HashMap<>();

		// keep showing the menu until the user chooses 6 (Exit)
		while (true) {

			// menu is printed again before every choice
			System.out.println("Student Marks Management System");
			System.out.println("1. Add/Update Student Marks");
			System.out.println("2. View Marks by Roll Number");
			System.out.println("3. Remove Student Record");
			System.out.println("4. Display All Student Records");
			System.out.println("5. Count Total Students");
			System.out.println("6. Exit");

			int choice = sc.nextInt();   // read the menu choice

			// switch picks the block that matches the choice
			switch (choice) {

			case 1:   // ---------- Add / Update ----------

				int rollNo = sc.nextInt();   // roll number
				int marks = sc.nextInt();    // marks

				addOrUpdateStudent(students, rollNo, marks);

				System.out.println(
						"Record saved for Roll No: " + rollNo);
				break;   // break stops the switch so the next case does not run

			case 2:   // ---------- View marks ----------

				int searchRoll = sc.nextInt();

				// Integer (not int) so that a missing student can be represented by null
				Integer studentMarks =
						getMarks(students, searchRoll);

				if (studentMarks != null) {
					System.out.println(
							"Marks for Roll No " + searchRoll
							+ ": " + studentMarks);
				} else {
					// get() returned null, so the roll number does not exist
					System.out.println(
							"Student record not found");
				}
				break;

			case 3:   // ---------- Remove record ----------

				int removeRoll = sc.nextInt();

				// removeStudent() returns true only if the record existed and was removed
				if (removeStudent(students, removeRoll)) {
					System.out.println(
							"Record removed for Roll No: "
							+ removeRoll);
				} else {
					System.out.println(
							"Student record not found");
				}
				break;

			case 4:   // ---------- Display all records ----------

				// isEmpty() is true when the map has no entries
				if (students.isEmpty()) {
					System.out.println(
							"No student records available");
				} else {
					System.out.println("Student Records:");

					// entrySet() gives all key-value pairs; each pair is a Map.Entry
					for (Map.Entry<Integer, Integer> entry
							: students.entrySet()) {

						System.out.println(
								"Roll No: " + entry.getKey()      // key = roll number
								+ ", Marks: "
								+ entry.getValue());              // value = marks
					}
				}
				break;

			case 5:   // ---------- Count students ----------

				// size() returns the number of key-value pairs in the map
				System.out.println(
						"Total Students: "
						+ students.size());
				break;

			case 6:   // ---------- Exit ----------

				System.out.println("Exiting");
				sc.close();   // close the Scanner
				return;       // leave main(), which ends the program
			}
		}
	}
}
```
