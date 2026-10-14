# LABSHEET 4: Write SQL queries using operators (BETWEEN, IN, LIKE, ORDER BY)

**AIM:** To write and execute SQL queries using the `BETWEEN`, `IN`, `LIKE`, and `ORDER BY` operators, and perform basic **Data Manipulation Language (DML)** operations such as **INSERT, UPDATE, and DELETE**.

<br>

## 1. Theory

### SQL Operators

| Operator | Purpose |
|---|---|
| `BETWEEN` | Selects values within a specified range |
| `IN` | Selects records matching any value in a given list |
| `LIKE` | Searches for a specified pattern in a column |
| `ORDER BY` | Sorts query results in ascending (`ASC`) or descending (`DESC`) order |

### DML Commands

| Command | Purpose |
|---|---|
| `INSERT` | Adds new records |
| `UPDATE` | Modifies existing records |
| `DELETE` | Removes records |

<br>

## 2. Create the `Student` Table

```sql
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(50),
    department VARCHAR(30),
    marks INT
);
```

**Output:** Table created successfully.

<br>

## 3. Insert Records

```sql
INSERT INTO Student
(student_id, student_name, department, marks)
VALUES
(101, 'Ananya', 'CSE', 85),
(102, 'Rahul', 'ISE', 72),
(103, 'Priya', 'ECE', 90),
(104, 'Kiran', 'CSE', 65),
(105, 'Meena', 'ISE', 88);
```

**Output:** 5 rows inserted successfully.

### Student Table

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        103 | Priya        | ECE        |    90 |
|        104 | Kiran        | CSE        |    65 |
|        105 | Meena        | ISE        |    88 |
+------------+--------------+------------+-------+
```

<br>

## 4. BETWEEN Operator

Displays students whose marks are between 70 and 90, including both boundary values.

```sql
SELECT * FROM Student
WHERE marks BETWEEN 70 AND 90;
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        103 | Priya        | ECE        |    90 |
|        105 | Meena        | ISE        |    88 |
+------------+--------------+------------+-------+
```

<br>

## 5. IN Operator

Displays students belonging to the `CSE` or `ISE` departments.

```sql
SELECT * FROM Student
WHERE department IN ('CSE', 'ISE');
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        104 | Kiran        | CSE        |    65 |
|        105 | Meena        | ISE        |    88 |
+------------+--------------+------------+-------+
```

<br>

## 6. LIKE Operator

Displays student names starting with the letter `A`.

```sql
SELECT * FROM Student
WHERE student_name LIKE 'A%';
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
+------------+--------------+------------+-------+
```

<br>

## 7. ORDER BY Operator

Displays students in descending order of marks.

```sql
SELECT * FROM Student
ORDER BY marks DESC;
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        103 | Priya        | ECE        |    90 |
|        105 | Meena        | ISE        |    88 |
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        104 | Kiran        | CSE        |    65 |
+------------+--------------+------------+-------+
```

<br>

## 8. UPDATE Operation

Increase Rahul's marks to 80.

```sql
UPDATE Student
SET marks = 80
WHERE student_id = 102;
```

**Output:** 1 row updated successfully.

<br>

## 9. DELETE Operation

Delete the student with `student_id = 104`.

```sql
DELETE FROM Student
WHERE student_id = 104;
```

**Output:** 1 row deleted successfully.

<br>

## 10. Display the Final Table

```sql
SELECT * FROM Student;
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    80 |
|        103 | Priya        | ECE        |    90 |
|        105 | Meena        | ISE        |    88 |
+------------+--------------+------------+-------+
```

---