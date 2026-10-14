# LABSHEET 6: Write SQL queries using GROUP BY and HAVING clauses

**AIM:** To write and execute SQL queries using the `GROUP BY` and `HAVING` clauses to group records and filter grouped results.

<br>

## 1. Theory

### GROUP BY

The `GROUP BY` clause groups rows that have the same values in one or more columns.  
It is commonly used with aggregate functions such as `COUNT()`, `SUM()`, `AVG()`, `MAX()`, and `MIN()`.

### HAVING

The `HAVING` clause filters grouped records after the `GROUP BY` operation.  
It works similarly to the `WHERE` clause, but it is applied to groups instead of individual rows.

<br>

## 2. Create the `Student` Table

```sql
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(50),
    department VARCHAR(20),
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
(103, 'Priya', 'CSE', 90),
(104, 'Kiran', 'ECE', 65),
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
|        103 | Priya        | CSE        |    90 |
|        104 | Kiran        | ECE        |    65 |
|        105 | Meena        | ISE        |    88 |
+------------+--------------+------------+-------+
```

<br>

## 4. GROUP BY Clause

Displays the number of students in each department.

**SQL Query**

```sql
SELECT department, COUNT(*) AS total_students
FROM Student
GROUP BY department;
```

**Output**

```
+------------+----------------+
| department | total_students |
+------------+----------------+
| CSE        |              2 |
| ECE        |              1 |
| ISE        |              2 |
+------------+----------------+
```

<br>

## 5. GROUP BY with SUM()

Displays the total marks obtained by students in each department.

**SQL Query**

```sql
SELECT department, SUM(marks) AS total_marks
FROM Student
GROUP BY department;
```

**Output**

```
+------------+-------------+
| department | total_marks |
+------------+-------------+
| CSE        |         175 |
| ECE        |          65 |
| ISE        |         160 |
+------------+-------------+
```

<br>

## 6. HAVING Clause

Displays departments having more than one student.

**SQL Query**

```sql
SELECT department, COUNT(*) AS total_students
FROM Student
GROUP BY department
HAVING COUNT(*) > 1;
```

**Output**

```
+------------+----------------+
| department | total_students |
+------------+----------------+
| CSE        |              2 |
| ISE        |              2 |
+------------+----------------+
```

---