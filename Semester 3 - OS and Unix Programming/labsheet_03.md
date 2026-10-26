# Experiment 3 - Programs using the following system calls of UNIX operating system `fork`, `exec`, `getpid`, `exit`, `wait`

- **fork()**: Clones the current process. You now have two (parent and child) running the same code. It returns `0` in the child, the child's PID in the parent, and `-1` if it fails.
- **exec()**: Replaces the current process with a brand-new program (like `ls`). It's really a family of calls (`execlp`, `execl`, etc.). If it works, it never returns, so any code after it only runs on failure.
- **getpid()**: Returns the PID (ID number) of the process that calls it. `getppid()` does the same for the parent.
- **exit(status)**: Ends the current process and hands a status number back to the parent. `0` means success and anything else means error.
- **wait(&status)**: Makes the parent pause until a child finishes, then picks up the child's exit status. This also stops the child from becoming a zombie.

`exp_3.c`
```c
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>

int main() {
	pid_t pid = fork();  // create child process

    // if fork failed
	if (pid < 0) {
		printf("Fork failed\n");
		exit(1);
	}
	
	// CHILD PROCESS
	else if (pid == 0) {                     
		printf("Child:  PID = %d, Parent PID = %d\n", getpid(), getppid());
		execlp("ls", "ls", NULL);   // replace child with 'ls' program
		printf("exec failed\n");    // only runs if exec fails
		exit(1);
	}
	
    // PARENT PROCESS
	else {
		int status;
		wait(&status);  // wait for child to finish
		printf("Parent: PID = %d, Child PID = %d\n", getpid(), pid);
		printf("Child finished, exit status = %d\n", WEXITSTATUS(status));
		exit(0);    // parent terminates
	}
}
```
To run this file:
```
gcc exp_3.c -o exp_3 && ./exp_3
```

OUTPUT:
```
Child:  PID = 359, Parent PID = 355
a.out  main.c
Parent: PID = 355, Child PID = 359
Child finished, exit status = 0
```