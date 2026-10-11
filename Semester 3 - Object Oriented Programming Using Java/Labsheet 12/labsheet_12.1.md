# Experiment 12.1 - Task Scheduling System (Thread Priority)

Write a Java program that demonstrates thread priority by implementing a Task Scheduling System. A computer system executes multiple tasks concurrently, where each task is assigned a priority based on its importance.

The system includes the following tasks:

- Report Generation – Low Priority
- Transaction Processing – High Priority
- Activity Logging – Medium Priority

The objective is to demonstrate how thread priorities are assigned using the `setPriority()` method. Higher priority threads are generally given preference by the thread scheduler, although actual execution order depends on the JVM and OS.

Implement the following:

Create the following classes:

- `ReportGenerationThread` (extends Thread)
- `TransactionProcessingThread` (extends Thread)
- `LoggingActivityThread` (extends Thread)

Each thread should execute five iterations and display a message indicating:

- The task being performed
- The iteration number
- The name of the thread

In the main method:

1. Create objects of all three thread classes.
2. Assign priorities as follows:
   - Report Generation → `Thread.MIN_PRIORITY`
   - Transaction Processing → `Thread.MAX_PRIORITY`
   - Activity Logging → `Thread.NORM_PRIORITY`
3. Start all threads.
4. Allow the threads to execute concurrently.

---

### Input Format

The program takes 3 string inputs from the user, each entered line by line (one input per line):

- Name for Report Generation thread
- Name for Transaction Processing thread
- Name for Logging Activity thread

### Output Format

Display messages in the following format:

```
Report generation - <count> by <thread_name>
Transaction processing - <count> by <thread_name>
Logging activity - <count> by <thread_name>
```

where:

- `<count>` represents the iteration number (1 to 5).
- `<thread_name>` represents the name of the currently executing thread.

**Note:** the threads run concurrently, so the order of the 15 output lines can change from run to run. Each message still appears exactly once.

### Example

```
ReportThread
TransactionThread
LoggingThread

Transaction processing - 1 by TransactionThread
Transaction processing - 2 by TransactionThread
Report generation - 1 by ReportThread
Report generation - 2 by ReportThread
Report generation - 3 by ReportThread
Logging activity - 1 by LoggingThread
Logging activity - 2 by LoggingThread
Logging activity - 3 by LoggingThread
Logging activity - 4 by LoggingThread
Logging activity - 5 by LoggingThread
Transaction processing - 3 by TransactionThread
Transaction processing - 4 by TransactionThread
Report generation - 4 by ReportThread
Transaction processing - 5 by TransactionThread
Report generation - 5 by ReportThread
```

```
R
T
L

Logging activity - 1 by L
Logging activity - 2 by L
Transaction processing - 1 by T
Transaction processing - 2 by T
Logging activity - 3 by L
Logging activity - 4 by L
Transaction processing - 3 by T
Report generation - 1 by R
Report generation - 2 by R
Transaction processing - 4 by T
Logging activity - 5 by L
Transaction processing - 5 by T
Report generation - 3 by R
Report generation - 4 by R
Report generation - 5 by R
```

---

### Solution Code

```java
import java.util.Scanner;

// Task 1: Report Generation (LOW priority)
// Thread is created by extending the Thread class
class ReportGenerationThread extends Thread {

	// Constructor receives the thread name and passes it to the Thread class constructor
	ReportGenerationThread(String name) {
		super(name);
	}

	// run() holds the code the thread executes once start() is called
	public void run() {
		// five iterations, each printing the task, iteration number and thread name
		for (int i = 1; i <= 5; i++) {
			// getName() returns the name given to this thread
			System.out.println("Report generation - " + i + " by " + getName());
		}
	}
}

// Task 2: Transaction Processing (HIGH priority)
class TransactionProcessingThread extends Thread {

	TransactionProcessingThread(String name) {
		super(name);
	}

	public void run() {
		for (int i = 1; i <= 5; i++) {
			System.out.println("Transaction processing - " + i + " by " + getName());
		}
	}
}

// Task 3: Activity Logging (MEDIUM priority)
class LoggingActivityThread extends Thread {

	LoggingActivityThread(String name) {
		super(name);
	}

	public void run() {
		for (int i = 1; i <= 5; i++) {
			System.out.println("Logging activity - " + i + " by " + getName());
		}
	}
}

public class TaskSchedulingSystem {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);

		// Read the 3 thread names, one per line
		String reportName = sc.nextLine();
		String transactionName = sc.nextLine();
		String loggingName = sc.nextLine();

		// Create one thread object for each task, giving each its name
		ReportGenerationThread t1 = new ReportGenerationThread(reportName);
		TransactionProcessingThread t2 = new TransactionProcessingThread(transactionName);
		LoggingActivityThread t3 = new LoggingActivityThread(loggingName);

		// setPriority() hints to the scheduler how important a thread is
		// MIN_PRIORITY = 1, NORM_PRIORITY = 5 (default), MAX_PRIORITY = 10
		t1.setPriority(Thread.MIN_PRIORITY);   // report generation: lowest
		t2.setPriority(Thread.MAX_PRIORITY);   // transaction processing: highest
		t3.setPriority(Thread.NORM_PRIORITY);  // activity logging: normal

		// start() creates a new thread and calls run() on it
		// all three run concurrently; priority is only a hint, so the output order is not guaranteed
		t1.start();
		t2.start();
		t3.start();

		sc.close();
	}
}
```