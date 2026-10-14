# LABSHEET 10: Write SQL queries to implement stored procedures

**AIM:** To create and execute stored procedures in SQL for performing database operations.

<br>

## 1. Theory

A **Stored Procedure** is a collection of SQL statements stored in the database.  
It can be executed whenever required, helping code reusability and database operations.

### Advantages of Stored Procedures

- Reduces repeated SQL code.
- Can improve execution efficiency.
- Enhances security by restricting direct table access when permissions are configured appropriately.
- Simplifies database operations.

<br>

## 2. Create the `Student` Table

```sql
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(30),
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
(103, 'Priya', 'ECE', 90);
```

**Output:** 3 rows inserted successfully.

### Student Table

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        103 | Priya        | ECE        |    90 |
+------------+--------------+------------+-------+
```

<br>

## 4. Create a Stored Procedure

Create a stored procedure to display all student records.

```sql
DELIMITER //

CREATE PROCEDURE DisplayStudents()
BEGIN
    SELECT * FROM Student;
END //

DELIMITER ;
```

**Output:** Procedure created successfully.

<br>

## 5. Execute the Stored Procedure

```sql
CALL DisplayStudents();
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        103 | Priya        | ECE        |    90 |
+------------+--------------+------------+-------+
```

**Explanation:** The procedure retrieves all records from the `Student` table.

<br>

## 6. Stored Procedure with a Parameter

Create a procedure to display the details of a specific student using `student_id`.

```sql
DELIMITER //

CREATE PROCEDURE GetStudent(IN p_id INT)
BEGIN
    SELECT * FROM Student
    WHERE student_id = p_id;
END //

DELIMITER ;
```

**Output:** Procedure created successfully.

### Execute the Procedure

```sql
CALL GetStudent(101);
```

**Output**

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
+------------+--------------+------------+-------+
```

**Explanation:** The procedure displays the details of the student whose `student_id` is `101`.

<br>

## 7. Delete the Stored Procedure

Delete the parameterized procedure when it is no longer required.

```sql
DROP PROCEDURE GetStudent;
```

**Output:** Procedure dropped successfully.

<br>

## 8. Summary of Stored Procedure Commands

| SQL Command | Purpose |
|---|---|
| `CREATE PROCEDURE` | Creates a stored procedure |
| `CALL` | Executes a stored procedure in MySQL |
| `DROP PROCEDURE` | Deletes a stored procedure |

---