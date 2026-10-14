# File manipulation Commands

- ### `mkdir`
  
  Creates a new directory

  ```
  > mkdir DemoFolder
  > ls
  DemoFolder Files
  ```

<br>

- ### `rmdir`
  
  Removes an empty directory

  ```
  > rmdir DemoFolder
  > ls
  Files
  ```

  **NOTE:** `rmdir` only deletes empty directories. To force it, use `-r` flag to delete directories with files.

<br>

- ### `touch`

  Creates a file

  ```
  > touch demo.txt
  > ls
  demo.txt
  ```

<br>

- ### `rm`

  Deletes a file permanently

  ```
  > rm some_file.txt
  ```

<br>

- ### `cat`

  Displays the contents inside a file.  
  It can be also be used to edit the contents of a file.

  ```
  > cat > demo.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  ^C
  ```
  ```
  > cat demo.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  ```

<br>

- ### `cp`

  Copies contents of one file to another

  ```
  > cp demo.txt demo_copy.txt
  > cat demo_copy.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  Have a nice dayyyyy!
  VI Editor is bullsh*t!!!
  ```

<br>

- ### `mv`

  Moves or renames files and folders

  ```
  > mv demo_copy.txt final.txt
  > ls
  final.txt
  ```
  ```
  > mkdir DemoText
  > mv final.txt DemoText
  > cd DemoText
  > ls
  final.txt
  ```

<br>

- ### `rm`

  Deletes a file permanently

  ```
  > rm some_file.txt
  ```

<br>

- ### `head` and `tail`

  View first / last few lines of a file

  ```
  > cat > num.txt
  1
  2
  3
  4
  5
  6
  7
  8
  9
  10
  ^C
  > head -4 num.txt
  1
  2
  3
  4
  > tail -3 num.txt
  8
  9
  10
  ```

<br>

- ### `sort`

  Sorts the contents of a file

  ```
  > cat numbers.txt
  5
  2
  1
  4
  3
  > sort numbers.txt
  1
  2
  3
  4
  5
  ```

<br>

- ### `grep`

  Search for a pattern in a file

  ```
  > cat final.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  Have a nice dayyyyy!
  VI Editor is bullsh*t!!!

  > grep "Yashwanth" final.txt
  Hello, I am Yashwanth M.
  ```