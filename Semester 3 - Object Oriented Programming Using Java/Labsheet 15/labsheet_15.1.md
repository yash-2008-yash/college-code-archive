# Experiment 15.1 - Sorting Objects Using Comparable, Comparator, and Lambda Expressions

Write a Java program to demonstrate soriting of objects using the Comparable interface, Comparator interface, and Lambda expressions.

The provided program reads the details of multiple students, displays the original list, then sorts the students using the **Comparable** interface, the **Comparator** interface, and a Lambda expression. You need to complete the **Student** and **NameComparator** classes according to the given specifications.

**Student Class:**  
Create a class named **Student** with the following data members:
- int id
- String name
- double marks
Implement the following requirements:
1. Implement the `Comparable<Student>` interface.
2. Override the `compareTo()` method to sort students by ID in ascending order.
3. Implement a parametrized constructor to initialize all the data members.
4. Override the `toString()` method to return the student details in the following format:
	```
	StdudentID StudentName StudentMarks
	```
	Separate the fields using a single space.

**NameComparator Class:**  
Create a class named **NameComparator** that:
- Implements the `Comparator<Student>` interface.
- Implements the `compare()` method to sort students by name in alphabetical order.

**Program Execution**  
The provided **main()** method:
- Reads the student details and stores them in a list.
- Displays the original list of students.
- Sorts the students by ID using the **Comparable** interface.
- Sorts the students by name using the **Comparator** interface.
- Sorts the students by marks in descending order using a Lambda expression.
---

### Input Format

1. The first line contains an integer *n*, representing the number of students.
2. The next *n* students each contain the following details:
	- An integer representing the student ID.
	- A string representing the student name.
	- A double representing the student marks.

### Output Format

Display the following in order:
- The original list of students.
- The list sorted by ID using the **Comparable** interface.
- The list sorted by name using the **Comparator** interface.
- The list sorted by marks in descending order using a Lambda expression.

Each student record should be displayed in the following format:
```
StudentID StudentName StudentMarks
```
Separate the fields using a single space. 

### Example

```
3
103
Charlie
85.5
101
Alice
92.0
102
Bob
88.5

103 Charlie 85.5
101 Alice 92.0
102 Bob 88.5
101 Alice 92.0
102 Bob 88.5
103 Charlie 85.5
01 Alice 92.0
102 Bob 88.5
103 Charlie 85.5
01 Alice 92.0
102 Bob 88.5
103 Charlie 85.5
```

---

### Solution Code

```java
import java.util.*;

class Student implements Comparable<Student> {
    int id;
    String name;
    double marks;

    Student(int id, String name, double marks) {
        this.id = id;
        this.name = name;
        this.marks = marks;
    }

    @Override
    public int compareTo(Student other) {
        return Integer.compare(this.id, other.id);
    }

    @Override
    public String toString() {
        return id + " " + name + " " + marks;
    }
}

class NameComparator implements Comparator<Student> {
    @Override
    public int compare(Student s1, Student s2) {
        return s1.name.compareTo(s2.name);
    }
}

public class Main {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        int n = sc.nextInt();
        sc.nextLine();

        ArrayList<Student> students = new ArrayList<>();

        for(int i = 0; i < n; i++) {
            int id = sc.nextInt();
            sc.nextLine();
            String name = sc.nextLine();
            double marks = sc.nextDouble();
            sc.nextLine();

            students.add(new Student(id, name, marks));
        }

        ArrayList<Student> original = new ArrayList<>(students);

        for(Student s : students) {
            System.out.println(s);
        }

        Collections.sort(students);
        for(Student s : students) {
            System.out.println(s);
        }

        Collections.sort(students, new NameComparator());
        for(Student s : students) {
            System.out.println(s);
        }

        students.sort((s1, s2) ->
            Double.compare(s2.marks, s1.marks)
        );

        for(Student s : students) {
            System.out.println(s);
        }

        sc.close();
    }
}
```