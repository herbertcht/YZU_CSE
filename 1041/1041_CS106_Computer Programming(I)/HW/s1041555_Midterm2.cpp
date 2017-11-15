// Computes the factorial of the number input by user.
#include <iostream>
using namespace std;

// multiplier = multiplicand * multiplier;
void multiplication(int multiplicand, int *&multiplier, int &multiplierSize);

int size(int number); // return the number of digits of number

// hugeInt2 = hugeInt1
void copy(int *hugeInt1, int *&hugeInt2, int hugeInt1Size, int &hugeInt2Size);

void recursiveDisplay(int *hugeInt, int hugeIntSize);

// function main begins program execution
int main()
{
	int number;
	cout << "Enter a positive integer: ";
	cin >> number;

	int *factorial = new int[1];
	factorial[0] = 1;
	int factorialSize = 1;

	for (int n = 2; n <= number; ++n)
		multiplication(n, factorial, factorialSize); // factorial = n * factorial

	cout << endl << number << "! = ";
	recursiveDisplay(factorial, factorialSize);
	cout << endl << endl;

	delete[] factorial;

	system("pause");
} // end function main

// multiplier = multiplicand * multiplier;
void multiplication(int multiplicand, int *&multiplier, int &multiplierSize)
{
	int multiplicandSize = size(multiplicand);
	int productSize = multiplierSize + multiplicandSize;
	int *product = new int[productSize];
	int multiplicandMod = multiplicand % 10;
	int realMultiplicand = multiplicand;
	for (int i = 0; i < productSize; i++)
	{
		product[i] = 0;
	}
	for (int i = 0; i < multiplierSize; i++)
	{
		for (int j = 0; j < multiplicandSize; j++)
		{
			//product[i+j] += multiplicandMod * multiplier[i]; deleted
			realMultiplicand /= 10;
			multiplicandMod = realMultiplicand % 10;
			product[i] = multiplicand*multiplier[i];//added
		}
	}
	//if (product[productSize - 1] > 9)deleted
	//{
		for (int i = 0; i < productSize-1; i++)
		{
			if (product[i] > 9) //added
			{
				product[i + 1] += product[i] / 10;
				product[i] %= 10;
			}
		}
	//}
	if (product[productSize-1] == 0)
	{
		productSize--;
	}	
	multiplierSize = productSize;
	copy(product, multiplier,productSize,multiplierSize);
	if (product != 0)
	{
		delete[] product;
	}
}

int size(int number) // return the number of digits of number
{
	int digit = 0;
	while (number > 0){
		number /= 10;
		digit++;
	}
	return digit;
}

// hugeInt2 = hugeInt1
void copy(int *hugeInt1, int *&hugeInt2, int hugeInt1Size, int &hugeInt2Size)
{
	if (hugeInt1Size >= hugeInt2Size)
	{
		delete[] hugeInt2;
		hugeInt2 = new int[hugeInt1Size];
		hugeInt2Size = hugeInt1Size;
	}
	else
	{
		delete[] hugeInt2;
		hugeInt2 = new int[hugeInt1Size];
		hugeInt2Size = hugeInt1Size;
	}
	for (int i = 0; i < hugeInt1Size; i++)
	{
		hugeInt2[i] = hugeInt1[i];
	}
}

void recursiveDisplay(int *hugeInt, int hugeIntSize)
{
	if (hugeIntSize > 0)
	{
		hugeIntSize--;
		cout << *(hugeInt + hugeIntSize);
		recursiveDisplay(hugeInt, hugeIntSize);
	}
}