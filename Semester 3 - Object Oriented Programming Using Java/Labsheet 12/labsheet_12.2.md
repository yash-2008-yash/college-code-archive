# Experiment 12.2 - Producer and Consumer Problem (Thread Synchronization)

Write a Java program to implement the Producer-Consumer problem using multithreading and synchronization.

### Program Requirements

1. **Input the number of items**
   - The program should prompt the user to enter the number of items `n` to be produced and consumed.

2. **Implement the following classes:**
   - `Product`: Represents the shared resource between the producer and consumer. It should store the current item and coordinate access between the producer and consumer using synchronization. It should provide methods to put and get items and maintain the number of items to be produced.
   - `Producer`: Implements the `Runnable` interface. It should produce items numbered from 0 to n - 1 and place them into the shared `Product` object.
   - `Consumer`: Implements the `Runnable` interface. It should consume the items from the shared `Product` object in the same order in which they are produced.

3. **Shared Resource Synchronization**

   The `Product` class should:
   - Allow the producer to put an item only when the previous item has been consumed.
   - Allow the consumer to get an item only when a new item has been produced.
   - Use appropriate synchronization mechanisms such as `synchronized`, `wait()`, and `notifyAll()` to coordinate the producer and consumer and avoid race conditions.

4. **Producer and Consumer Threads**
   - The provided `main()` method creates separate threads for the `Producer` and `Consumer` classes and starts them. The producer should produce all items from 0 to n - 1, and the consumer should consume all the produced items in the same order.

5. **Output**
   - Display:

```
PUT: <number>
GET: <number>
```

   - The `PUT` message should be displayed when the producer places an item, and the `GET` message should be displayed when the consumer consumes an item.

---

### Input Format

- The input consists of a single integer `n`, representing the number of items to be produced and consumed.
- The program prompts the user with:

```
number of items to be produced and consumed:
```

### Output Format

- Display the producer and consumer actions in the following format:

```
PUT: <number>
GET: <number>
```

- The producer should produce items from 0 to n - 1, and the consumer should consume the items in the same order.
- The `PUT` and `GET` operations should alternate correctly due to synchronization.

### Constraint

- n > 0

**Note:** Refer to visible test cases for print statements and a better understanding.

### Example

```
number of items to be produced and consumed: 5
PUT: 0
GET: 0
PUT: 1
GET: 1
PUT: 2
GET: 2
PUT: 3
GET: 3
PUT: 4
GET: 4
```

```
number of items to be produced and consumed: 1
PUT: 0
GET: 0
```

---

### Solution Code

```java
import java.util.Scanner;

// Shared resource: the "box" that holds ONE item at a time between producer and consumer
class Product {

	private int item;                    // the item currently stored in the box
	private boolean available = false;   // true = box is full (item waiting to be consumed), false = box is empty
	private int count;                   // total number of items to be produced / consumed

	// Constructor stores how many items must be handled
	Product(int count) {
		this.count = count;
	}

	// Lets Producer and Consumer know how many times to loop
	int getCount() {
		return count;
	}

	// Called by the Producer to place an item in the box
	// synchronized = only one thread can run put() or get() on this object at a time (avoids race conditions)
	synchronized void put(int item) {
		try {
			// If the box is still full, the previous item was not consumed yet,
			// so the producer must wait (it releases the lock while waiting)
			// while is used instead of if so the condition is re-checked after waking up
			while (available) {
				wait();
			}

			this.item = item;       // put the new item in the box
			available = true;       // box is now full
			System.out.println("PUT: " + item);

			// wake up the waiting consumer, as there is now an item to consume
			notifyAll();
		} catch (InterruptedException e) {
			// wait() can throw InterruptedException; restore the interrupt flag
			Thread.currentThread().interrupt();
		}
	}

	// Called by the Consumer to take an item from the box
	synchronized int get() {
		try {
			// If the box is empty, there is nothing to consume yet, so the consumer must wait
			while (!available) {
				wait();
			}

			int value = item;       // take the item out of the box
			available = false;      // box is now empty
			System.out.println("GET: " + value);

			// wake up the waiting producer, as the box is free again
			notifyAll();

			return value;
		} catch (InterruptedException e) {
			Thread.currentThread().interrupt();

			return -1;              // value returned only if the thread was interrupted
		}
	}
}

// Producer task: implements Runnable so it can be given to a Thread
class Producer implements Runnable {

	private Product product;   // the shared box

	// The same Product object is shared with the Consumer
	Producer(Product product) {
		this.product = product;
	}

	public void run() {
		// produce items 0, 1, 2, ... n-1, one at a time
		for (int i = 0; i < product.getCount(); i++) {
			product.put(i);   // blocks here if the previous item was not consumed
		}
	}
}

// Consumer task: also implements Runnable
class Consumer implements Runnable {

	private Product product;   // the same shared box

	Consumer(Product product) {
		this.product = product;
	}

	public void run() {
		// consume exactly n items, in the same order they were produced
		for (int i = 0; i < product.getCount(); i++) {
			product.get();    // blocks here if there is no new item yet
		}
	}
}

public class ProdCons {
	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);

		// read n, the number of items to produce and consume
		System.out.print("number of items to be produced and consumed: ");
		int n = sc.nextInt();

		// ONE shared Product object, used by both threads
		Product product = new Product(n);

		// wrap each Runnable task in its own Thread
		Thread producer = new Thread(new Producer(product));
		Thread consumer = new Thread(new Consumer(product));

		// start both threads; they now run concurrently, synchronized through the Product object
		producer.start();
		consumer.start();

		try {
			// join() makes main wait until both threads have finished
			producer.join();
			consumer.join();
		} catch (InterruptedException e) {
			Thread.currentThread().interrupt();
		}

		sc.close();
	}
}
```