# LABSHEET 1: Write SQL queries to create database schema using DDL commands

**AIM:** To understand and implement **Data Definition Language (DDL)** commands for creating a database schema, including databases, tables, constraints, and modifying database structures.

<br>

## 1. DDL Commands

| Command | Purpose |
|---|---|
| `CREATE` | Creates new objects |
| `ALTER` | Modifies existing objects |
| `DROP` | Deletes objects |
| `TRUNCATE` | Removes all rows from a table |
| `RENAME` | Renames objects |

<br>

## 2. Create a database

The `CREATE DATABASE` command creates a new database.

**Syntax**
```sql
CREATE DATABASE database_name;
```

**SQL Query**
```sql
CREATE DATABASE college_db;
```

### Select the Database

Use `USE` to select the database in which you want to work.

```sql
USE college_db;
```

<br>

## 3. Create a table

The `CREATE TABLE` command creates a new table.

**Syntax**
```sql
CREATE TABLE table_name (
    column_name data_type constraints
);
```

### Common Data Types

| Data Type | Description |
|---|---|
| `INT` | Integer values |
| `VARCHAR(n)` | Variable-length characters |
| `CHAR(n)` | Fixed-length characters |
| `DATE` | Stores a date |
| `FLOAT` | Decimal values |
| `BOOLEAN` | True/false values |

### Create the `Student` Table

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

## 4. INSERT Operation

The `INSERT` command adds new records to a table.

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

## 5. ALTER TABLE

The `ALTER TABLE` command modifies an existing table.

### Add a Column

```sql
ALTER TABLE Student
ADD phone VARCHAR(15);
```

### Modify a Column

```sql
ALTER TABLE Student
MODIFY phone VARCHAR(20);
```

### Rename a Column

```sql
ALTER TABLE Student
RENAME COLUMN phone TO mobile_number;
```

### Drop a Column

```sql
ALTER TABLE Student
DROP COLUMN mobile_number;
```

<br>

## 6. RENAME TABLE

The `RENAME TABLE` command renames an existing table.

```sql
RENAME TABLE Student TO Students;
```

<br>

## 7. TRUNCATE TABLE

The `TRUNCATE TABLE` command removes all rows from a table while keeping the table structure.

```sql
TRUNCATE TABLE Students;
```

<br>

## 8. DROP TABLE

The `DROP TABLE` command deletes a table, including its structure.

```sql
DROP TABLE Students;
```

<br>

## 9. DROP DATABASE

The `DROP DATABASE` command deletes the database.

```sql
DROP DATABASE college_db;
```

---