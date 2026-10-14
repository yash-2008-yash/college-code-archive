# LABSHEET 9: Write SQL queries to create and use views

**AIM:** To create and use SQL views for retrieving data from one or more database tables.

<br>

## 1. Theory

A **View** is a virtual table created from the result of a SQL `SELECT` query.  
It does not store data physically but displays data from the underlying table or tables.

### Advantages of Views

- Simplifies complex SQL queries.
- Provides data security by restricting access to specific columns.
- Presents customized data to different users.
- Makes data retrieval easier and reusable.

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
(103, 'Priya', 'CSE', 90);
```

**Output:** 3 rows inserted successfully.

### Student Table

```
+------------+--------------+------------+-------+
| student_id | student_name | department | marks |
+------------+--------------+------------+-------+
|        101 | Ananya       | CSE        |    85 |
|        102 | Rahul        | ISE        |    72 |
|        103 | Priya        | CSE        |    90 |
+------------+--------------+------------+-------+
```

<br>

## 4. Create a View

Create a view to display only the student name and marks.

**SQL Query**

```sql
CREATE VIEW Student_View AS
SELECT student_name, marks FROM Student;
```

**Output:** View `Student_View` created successfully.

<br>

## 5. Display Data from the View

```sql
SELECT * FROM Student_View;
```

**Output**

```
+--------------+-------+
| student_name | marks |
+--------------+-------+
| Ananya       |    85 |
| Rahul        |    72 |
| Priya        |    90 |
+--------------+-------+
```

**Explanation:** The view displays only the selected columns (`student_name` and `marks`) from the `Student` table.

<br>

## 6. Update the View Definition

Modify the view to include the department column.

```sql
CREATE OR REPLACE VIEW Student_View AS
SELECT student_name, department, marks FROM Student;
```

**Output:** View replaced successfully.

### Display the Updated View

```sql
SELECT * FROM Student_View;
```

**Output**

```
+--------------+------------+-------+
| student_name | department | marks |
+--------------+------------+-------+
| Ananya       | CSE        |    85 |
| Rahul        | ISE        |    72 |
| Priya        | CSE        |    90 |
+--------------+------------+-------+
```

<br>

## 7. Drop the View

Delete the view when it is no longer required.

```sql
DROP VIEW Student_View;
```

**Output:** View dropped successfully.

<br>

## 8. Summary of View Commands

| SQL Command | Purpose |
|---|---|
| `CREATE VIEW` | Creates a new view |
| `SELECT * FROM ViewName` | Displays data from the view |
| `CREATE OR REPLACE VIEW` | Modifies an existing view definition |
| `DROP VIEW` | Deletes the view |

---