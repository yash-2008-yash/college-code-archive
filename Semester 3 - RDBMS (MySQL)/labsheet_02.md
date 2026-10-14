# LABSHEET 2: Write SQL queries to perform basic DML operations (INSERT, UPDATE, DELETE)

**AIM:** To write and execute SQL queries to perform basic **Data Manipulation Language (DML)** operations such as **INSERT, UPDATE, and DELETE** using a relational database table.

<br>

## 1. Create the `Student` Table

```sql
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(50),
    department VARCHAR(30),
    age INT,
    marks INT
);
```

<br>

## 2. INSERT Operation

The `INSERT` command is used to add new records to a table.

**Syntax**
```sql
INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);
```

### Example 1: Insert a Single Record

```sql
INSERT INTO Student
(student_id, student_name, department, age, marks)
VALUES
(101, 'Ananya', 'CSE', 20, 85);
```

### Example 2: Insert Multiple Records

```sql
INSERT INTO Student
(student_id, student_name, department, age, marks)
VALUES
(101, 'Ananya', 'CSE', 20, 85),
(102, 'Rahul', 'ISE', 21, 78),
(103, 'Priya', 'ECE', 20, 88),
(104, 'Kiran', 'CSE', 22, 91);
```

### Table After Inserting Multiple Records

```
+------------+--------------+------------+------+-------+
| student_id | student_name | department | age  | marks |
+------------+--------------+------------+------+-------+
|        101 | Ananya       | CSE        |   20 |    85 |
|        102 | Rahul        | ISE        |   21 |    78 |
|        103 | Priya        | ECE        |   20 |    88 |
|        104 | Kiran        | CSE        |   22 |    91 |
+------------+--------------+------------+------+-------+
```

<br>

## 3. UPDATE Operation

The `UPDATE` command is used to modify existing records in a table.

**Syntax**
```sql
UPDATE table_name
SET column_name = new_value
WHERE condition;
```

### Example 1: Update Marks of a Student

```sql
UPDATE Student
SET marks = 90
WHERE student_id = 102;
```

### After UPDATE

```
+------------+--------------+------------+-----+-------+
| student_id | student_name | department | age | marks |
+------------+--------------+------------+-----+-------+
|        102 | Rahul        | ISE        |  21 |    90 |
+------------+--------------+------------+-----+-------+
```

### Example 2: Update Multiple Columns

```sql
UPDATE Student
SET department = 'CSE', marks = 95
WHERE student_id = 103;
```

**Updated Record**

```
+------------+--------------+------------+-----+-------+
| student_id | student_name | department | age | marks |
+------------+--------------+------------+-----+-------+
|        103 | Priya        | CSE        |  20 |    95 |
+------------+--------------+------------+-----+-------+
```

### Example 3: Update Multiple Records

```sql
UPDATE Student
SET marks = marks + 5
WHERE department = 'CSE';
```

This query increases the marks of every student in the `CSE` department by 5.

<br>

## 4. DELETE Operation

The `DELETE` command is used to remove existing records from a table.

**Syntax**
```sql
DELETE FROM table_name
WHERE condition;
```

### Example 1: Delete a Specific Record

```sql
DELETE FROM Student
WHERE student_id = 104;
```

**Output:** 1 row deleted successfully, if student `104` exists.

### Example 2: Delete Records Based on a Condition

```sql
DELETE FROM Student
WHERE marks < 80;
```

This query deletes all records where the student's marks are less than 80.

<br>

## 5. Display the Table Contents

The `SELECT` command can be used to verify the results of DML operations.

```sql
SELECT * FROM Student;
```

### Sample Output

The following is the sample output shown in the lab sheet after the listed updates:

```
+------------+--------------+------------+-----+-------+
| student_id | student_name | department | age | marks |
+------------+--------------+------------+-----+-------+
|        101 | Ananya       | CSE        |  20 |    90 |
|        102 | Rahul        | ISE        |  21 |    90 |
|        103 | Priya        | CSE        |  20 |   100 |
+------------+--------------+------------+-----+-------+
```

---