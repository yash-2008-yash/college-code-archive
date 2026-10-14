# LABSHEET 3: Write SQL queries using constraints (PRIMARY KEY, FOREIGN KEY, UNIQUE, NOT NULL)

**AIM:** To write and execute SQL queries using the **PRIMARY KEY, FOREIGN KEY, UNIQUE, and NOT NULL** constraints, and to perform basic **Data Manipulation Language (DML)** operations such as **INSERT, UPDATE, and DELETE**.

<br>

## 1. Create the `Department` Table

```sql
CREATE TABLE Department (
    dept_id INT PRIMARY KEY,
    dept_name VARCHAR(50) UNIQUE NOT NULL
);
```

**Expected Output:** Table `Department` created successfully.

<br>

## 2. Insert Records into the `Department` Table

```sql
INSERT INTO Department (dept_id, dept_name)
VALUES (1, 'Computer Science');

INSERT INTO Department (dept_id, dept_name)
VALUES (2, 'Information Science');

INSERT INTO Department (dept_id, dept_name)
VALUES (3, 'Electronics and Communication');
```

<br>

## 3. Display the Department Table

```sql
SELECT * FROM Department;
```

**Output**

```
+---------+------------------------------+
| dept_id | dept_name                    |
+---------+------------------------------+
|       1 | Computer Science              |
|       2 | Information Science           |
|       3 | Electronics and Communication |
+---------+------------------------------+
```

<br>

## 4. Create the `Student` Table

```sql
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    dept_id INT,
    FOREIGN KEY (dept_id) REFERENCES Department(dept_id)
);
```

### Constraints Used

| Constraint | Purpose |
|---|---|
| `PRIMARY KEY` | Uniquely identifies each record in a table |
| `FOREIGN KEY` | Links a record to a valid record in another table |
| `UNIQUE` | Prevents duplicate values in a column |
| `NOT NULL` | Prevents a column from containing `NULL` values |

<br>

## 5. INSERT Operation

### Example 1: Insert a Valid Student Record

```sql
INSERT INTO Student
(student_id, student_name, email, dept_id)
VALUES
(101, 'Ananya', 'ananya@gmail.com', 1);
```

**Output:** 1 row inserted successfully.

### Example 2: Insert Multiple Student Records

```sql
INSERT INTO Student
(student_id, student_name, email, dept_id)
VALUES
(102, 'Rahul', 'rahul@gmail.com', 2),
(103, 'Priya', 'priya@gmail.com', 1),
(104, 'Kiran', 'kiran@gmail.com', 3);
```

<br>

## 6. Display Student Records

```sql
SELECT * FROM Student;
```

**Output**

```
+------------+--------------+-------------------+---------+
| student_id | student_name | email             | dept_id |
+------------+--------------+-------------------+---------+
|        101 | Ananya       | ananya@gmail.com  |       1 |
|        102 | Rahul        | rahul@gmail.com   |       2 |
|        103 | Priya        | priya@gmail.com   |       1 |
|        104 | Kiran        | kiran@gmail.com   |       3 |
+------------+--------------+-------------------+---------+
```

<br>

## 7. Testing Constraints

### 7.1 Testing the `PRIMARY KEY` Constraint

**Query**

```sql
INSERT INTO Student
(student_id, student_name, email, dept_id)
VALUES
(101, 'Ravi', 'ravi@gmail.com', 1);
```

**Expected Result:** Error — duplicate primary key value.

**Explanation:** `student_id = 101` already exists in the table.

### 7.2 Testing the `UNIQUE` Constraint

**Query**

```sql
INSERT INTO Student
(student_id, student_name, email, dept_id)
VALUES
(105, 'Ravi', 'ananya@gmail.com', 1);
```

**Expected Result:** Error — duplicate value violates the `UNIQUE` constraint.

**Explanation:** The email address already exists in the table.

### 7.3 Testing the `NOT NULL` Constraint

**Query**

```sql
INSERT INTO Student
(student_id, student_name, email, dept_id)
VALUES
(106, NULL, 'newstudent@gmail.com', 1);
```

**Expected Result:** Error — `student_name` cannot be `NULL`.

### 7.4 Testing the `FOREIGN KEY` Constraint

**Query**

```sql
INSERT INTO Student
(student_id, student_name, email, dept_id)
VALUES
(107, 'Meena', 'meena@gmail.com', 10);
```

**Expected Result:** Error — foreign key constraint violation.

**Explanation:** `dept_id = 10` does not exist in the `Department` table.

<br>

## 8. UPDATE Operation

The `UPDATE` command is used to modify existing records.

### Example 1: Update Student Email

```sql
UPDATE Student
SET email = 'rahul_updated@gmail.com'
WHERE student_id = 102;
```

**Output:** 1 row updated successfully.

**Before UPDATE**

```
+------------+--------------+------------------+
| student_id | student_name | email            |
+------------+--------------+------------------+
|        102 | Rahul        | rahul@gmail.com  |
+------------+--------------+------------------+
```

**After UPDATE**

```
+------------+--------------+-------------------------+
| student_id | student_name | email                   |
+------------+--------------+-------------------------+
|        102 | Rahul        | rahul_updated@gmail.com |
+------------+--------------+-------------------------+
```

### Example 2: Change the Department of a Student

```sql
UPDATE Student
SET dept_id = 3
WHERE student_id = 103;
```

**Output:** 1 row updated successfully.

This update is valid because `dept_id = 3` exists in the `Department` table.

### Invalid UPDATE Example

```sql
UPDATE Student
SET dept_id = 10
WHERE student_id = 103;
```

**Expected Result:** Error — foreign key constraint violation.

**Reason:** `dept_id = 10` does not exist in the `Department` table.

<br>

## 9. DELETE Operation

### Example 1: Delete a Student Record

```sql
DELETE FROM Student
WHERE student_id = 104;
```

**Output:** 1 row deleted successfully.

### Student Table Before DELETE

```
+------------+--------------+-------------------------+---------+
| student_id | student_name | email                   | dept_id |
+------------+--------------+-------------------------+---------+
|        101 | Ananya       | ananya@gmail.com        |       1 |
|        102 | Rahul        | rahul_updated@gmail.com |       2 |
|        103 | Priya        | priya@gmail.com         |       1 |
|        104 | Kiran        | kiran@gmail.com         |       3 |
+------------+--------------+-------------------------+---------+
```

### Student Table After DELETE

```
+------------+--------------+-------------------------+---------+
| student_id | student_name | email                   | dept_id |
+------------+--------------+-------------------------+---------+
|        101 | Ananya       | ananya@gmail.com        |       1 |
|        102 | Rahul        | rahul_updated@gmail.com |       2 |
|        103 | Priya        | priya@gmail.com         |       1 |
+------------+--------------+-------------------------+---------+
```

<br>

## 10. Referential Integrity and DELETE

Suppose a department has students associated with it.

- **Department 1:** Computer Science
- **Student 101:** Department 1
- **Student 103:** Department 1

If we try to delete Department 1:

```sql
DELETE FROM Department
WHERE dept_id = 1;
```

**Possible Output:** Error — cannot delete the parent record because child records exist.

This protection is provided by the **FOREIGN KEY** constraint. The database may reject the deletion while student records still refer to that department.

---