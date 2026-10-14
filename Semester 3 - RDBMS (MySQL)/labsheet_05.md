# LABSHEET 5: Write SQL queries using aggregate functions (COUNT, SUM, AVG, MAX, MIN)

**AIM:** To write and execute SQL queries using aggregate functions `COUNT()`, `SUM()`, `AVG()`, `MAX()`, and `MIN()` to perform calculations on data stored in a table.

<br>

## 1. Theory

Aggregate functions perform calculations on a group of rows and return a single result.

| Function | Purpose |
|---|---|
| `COUNT()` | Counts the number of rows |
| `SUM()` | Calculates the total of a numeric column |
| `AVG()` | Calculates the average value |
| `MAX()` | Finds the highest value |
| `MIN()` | Finds the lowest value |

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

## 4. COUNT() Function

Counts the total number of students.

**Query**

```sql
SELECT COUNT(*) AS total_students
FROM Student;
```

**Output**

```
+----------------+
| total_students |
+----------------+
|              5 |
+----------------+
```

<br>

## 5. SUM() Function

Calculates the total marks of all students.

**Query**

```sql
SELECT SUM(marks) AS total_marks
FROM Student;
```

**Output**

```
+-------------+
| total_marks |
+-------------+
|         400 |
+-------------+
```

<br>

## 6. AVG() Function

Calculates the average marks.

**Query**

```sql
SELECT AVG(marks) AS average_marks
FROM Student;
```

**Output**

```
+--------------+
| average_marks|
+--------------+
|      80.0000 |
+--------------+
```

<br>

## 7. MAX() Function

Displays the highest marks.

**Query**

```sql
SELECT MAX(marks) AS highest_marks
FROM Student;
```

**Output**

```
+---------------+
| highest_marks |
+---------------+
|            90 |
+---------------+
```

<br>

## 8. MIN() Function

Displays the lowest marks.

**Query**

```sql
SELECT MIN(marks) AS lowest_marks
FROM Student;
```

**Output**

```
+--------------+
| lowest_marks |
+--------------+
|           65 |
+--------------+
```

<br>

## 9. Summary of Aggregate Functions

| Function | SQL Query | Result |
|---|---|---:|
| `COUNT()` | `SELECT COUNT(*) FROM Student;` | 5 |
| `SUM()` | `SELECT SUM(marks) FROM Student;` | 400 |
| `AVG()` | `SELECT AVG(marks) FROM Student;` | 80 |
| `MAX()` | `SELECT MAX(marks) FROM Student;` | 90 |
| `MIN()` | `SELECT MIN(marks) FROM Student;` | 65 |

---