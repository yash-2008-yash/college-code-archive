# LABSHEET 8: Write SQL queries to implement joins (INNER JOIN, LEFT JOIN, RIGHT JOIN)

**AIM:** To write and execute SQL queries using `INNER JOIN`, `LEFT JOIN`, and `RIGHT JOIN` to retrieve data from two related tables.

<br>

## 1. Theory

A `JOIN` is used to combine data from two or more tables based on a related column.

| Join | Purpose |
|---|---|
| `INNER JOIN` | Returns only the matching records from both tables |
| `LEFT JOIN` | Returns all records from the left table and matching records from the right table |
| `RIGHT JOIN` | Returns all records from the right table and matching records from the left table |

<br>

## 2. Create the `Department` Table

```sql
CREATE TABLE Department (
    dept_id INT PRIMARY KEY,
    dept_name VARCHAR(30)
);
```

**Output:** Table `Department` created successfully.

<br>

## 3. Create the `Student` Table

```sql
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(30),
    dept_id INT,
    FOREIGN KEY (dept_id) REFERENCES Department(dept_id)
);
```

**Output:** Table `Student` created successfully.

<br>

## 4. Insert Records

### Department Table

```sql
INSERT INTO Department
(dept_id, dept_name)
VALUES
(1, 'CSE'),
(2, 'ISE'),
(3, 'ECE');
```

### Student Table

```sql
INSERT INTO Student
(student_id, student_name, dept_id)
VALUES
(101, 'Ananya', 1),
(102, 'Rahul', 2),
(103, 'Priya', 1);
```

**Output:** Rows inserted successfully.

### Department Table

```
+---------+-----------+
| dept_id | dept_name |
+---------+-----------+
|       1 | CSE       |
|       2 | ISE       |
|       3 | ECE       |
+---------+-----------+
```

### Student Table

```
+------------+--------------+---------+
| student_id | student_name | dept_id |
+------------+--------------+---------+
|        101 | Ananya       |       1 |
|        102 | Rahul        |       2 |
|        103 | Priya        |       1 |
+------------+--------------+---------+
```

<br>

## 5. INNER JOIN

**Purpose:** Displays only the records that have matching values in both tables.

**SQL Query**

```sql
SELECT 
Student.student_id,
Student.student_name,
Department.dept_name
FROM Student
INNER JOIN Department
ON Student.dept_id = Department.dept_id;
```

**Expected Output** (based on the inserted records)

```
+------------+--------------+-----------+
| student_id | student_name | dept_name |
+------------+--------------+-----------+
|        101 | Ananya       | CSE       |
|        102 | Rahul        | ISE       |
|        103 | Priya        | CSE       |
+------------+--------------+-----------+
```

**Explanation:** Only matching department records are displayed.

<br>

## 6. LEFT JOIN

**Purpose:** Displays all records from the `Student` table and matching records from the `Department` table.

**SQL Query**

```sql
SELECT
Student.student_id,
Student.student_name,
Department.dept_name
FROM Student
LEFT JOIN Department
ON Student.dept_id = Department.dept_id;
```

**Output**

```
+------------+--------------+-----------+
| student_id | student_name | dept_name |
+------------+--------------+-----------+
|        101 | Ananya       | CSE       |
|        102 | Rahul        | ISE       |
|        103 | Priya        | CSE       |
+------------+--------------+-----------+
```

**Explanation:** All students are displayed. If a student has no matching department, `NULL` is shown for `dept_name`.

<br>

## 7. RIGHT JOIN

**Purpose:** Displays all records from the `Department` table and matching records from the `Student` table.

**SQL Query**

```sql
SELECT
Student.student_id,
Student.student_name,
Department.dept_name
FROM Student
RIGHT JOIN Department
ON Student.dept_id = Department.dept_id;
```

**Output**

```
+------------+--------------+-----------+
| student_id | student_name | dept_name |
+------------+--------------+-----------+
|        101 | Ananya       | CSE       |
|        103 | Priya        | CSE       |
|        102 | Rahul        | ISE       |
|       NULL | NULL         | ECE       |
+------------+--------------+-----------+
```

**Explanation:** All departments are displayed. Since no student belongs to the `ECE` department, the student columns contain `NULL`.

<br>

## 8. Difference Between Joins

| Join | Result |
|---|---|
| `INNER JOIN` | Returns only matching records from both tables |
| `LEFT JOIN` | Returns all rows from the left table and matching rows from the right table |
| `RIGHT JOIN` | Returns all rows from the right table and matching rows from the left table |

---