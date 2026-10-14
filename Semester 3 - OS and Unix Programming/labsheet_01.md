# Basic UNIX Commands and various UNIX editors such as vi

- ### `pwd`

  Prints the current working directory

  ```
  > pwd
  /home/yashwanth-m
  ```

<br>

- ### `ls`

  Lists out the contents inside the current directory

  **NOTE:** `-l -a` will provide a detailed info

  ```
  > ls -l -a
  total 788
  drwxr-x--- 36 yashwanth-m yashwanth-m   4096 Oct 14 20:27 .
  drwxr-xr-x  3 root        root          4096 Oct 23  2025 ..
  -rw-rw-r--  1 yashwanth-m yashwanth-m    140 Dec 11  2025 .apport-ignore.xml
  drwxrwxr-x  7 yashwanth-m yashwanth-m   4096 Apr 14  2026 .cursor
  drwxr-xr-x  2 yashwanth-m yashwanth-m   4096 Jun 29 21:27 Desktop
  drwxr-xr-x  3 yashwanth-m yashwanth-m   4096 Oct 14 20:18 Downloads
  ...
  ```

<br>

- ### `cd`
  
  Changes the working directory

  ```
  > cd Downloads

  ~/Downloads
  > 
  ```

<br>

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

- ### `whoami`

  Displays the current user

  ```
  > whoami
  yashwanth-m
  ```

<br>

- ### `date`
  
  Displays system date and time
  
  ```
  > date
  Wed Oct 14 08:38:15 PM IST 2026
  ```

<br>

- ### `man`

  Displays the manual page of a command

  ```
  > man ls

  LS(1)                            User Commands                           LS(1)

  NAME
        ls - list directory contents

  SYNOPSIS
        ls [OPTION]... [FILE]...

  DESCRIPTION
        List  information  about  the FILEs (the current directory by default).
        Sort entries alphabetically if none of -cftuvSUX nor --sort  is  speci‐
        fied.

        Mandatory  arguments  to  long  options are mandatory for short options
        too.

        -a, --all
                do not ignore entries starting with .

        -A, --almost-all
                do not list implied . and ..
        
        ...
  ```

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

- ### `nano`

  This is also an UNIX editor.   
  After editing, `Ctrl + O` and `Ctrl + X` to exit.

  ```
  > nano demo.txt

  // Editing the file, then Ctrl + O and Ctrl + X
  ```
  ```
  > cat demo.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  Have a nice dayyyyy!
  ```

<br>

- ### `vi`

  One of the worst UNIX editor imo.
  
  To get a newline, press `o` before starting editing.  
  First, press `i` for start editing.  
  To save and quit, `esc` and `:wq`  
  To quit without saving, `esc` and `:q!`

  ```
  > vi demo.txt

  // Editing the file, then esc and :wq
  ```
  ```
  > cat demo.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  Have a nice dayyyyy!
  VI Editor is bullsh*t!!!
  ```