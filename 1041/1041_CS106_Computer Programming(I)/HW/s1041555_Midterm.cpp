#include <iostream>
using namespace std;

// enable user to input a positive huge integer from user
void inputHugeInt(int hugeInt1[], int &hugeInt1Size);

// return true if and only if hugeInt is a quirksome number
bool quirksome(int hugeInt[], int hugeIntSize);

// return true if and only if hugeInt1 == hugeInt2
bool equal(int hugeInt1[], int hugeInt2[], int hugeInt1Size, int hugeInt2Size);

// sum = addend + adder
void addition(int addend[], int adder[], int sum[], int addendSize, int adderSize, int &sumSize);

// square = hugeInt * hugeInt
void computeSquare(int hugeInt[], int square[], int hugeIntSize, int &squareSize);

const int arraySize = 80;

// function main begins program execution
int main()
{
	int hugeInt[arraySize] = {};
	int hugeIntSize = 0;
	inputHugeInt(hugeInt, hugeIntSize);

	for (int i = hugeIntSize - 1; i >= 0; --i)
		cout << hugeInt[i];
	if (quirksome(hugeInt, hugeIntSize))
		cout << " is a quirksome number\n\n";
	else
		cout << " is not a quirksome number\n\n";

	system("pause");
} // end function main

// enable user to input a positive huge integer from user
void inputHugeInt(int hugeInt[], int &hugeIntSize)
{
	char string[arraySize];
	cout << "Enter a positive integer of 10 or 12 digits: ";
	cin >> string;
	cout << endl;

	hugeIntSize = strlen(string);
	for (int i = 0; i < hugeIntSize; ++i)
		hugeInt[i] = string[hugeIntSize - i - 1] - '0';
}
void addition(int addend[], int adder[], int sum[], int addendSize, int adderSize, int &sumSize){

	sumSize = (addendSize >= adderSize) ? adderSize + 1 : addendSize + 1;

	for (int i = 0; i < addendSize; i++){
		sum[i] = addend[i];
	}
	for (int i = addendSize; i < sumSize; i++){
		sum[i] = 0;
	}
	for (int i = 0; i < sumSize; i++){
		sum[i] += adder[i];
	}

	for (int i = 0; i < adderSize; i++){
		if (sum[i] > 9){
			sum[i] -= 10;
			sum[i + 1]++;

		}
	}
	if (sum[sumSize - 1] == 0)
		sumSize--;

}

bool equal(int hugeInt1[], int hugeInt2[], int hugeInt1Size, int hugeInt2Size){
	//if (hugeInt2Size != hugeInt1Size) deleted
	if (hugeInt2Size != hugeInt2Size)//added
		return  false;
	for (int i = 0; i < hugeInt2Size; i++){
		if (hugeInt1[i] != hugeInt2[i])
			return false;
	}
	return true;
}


void computeSquare(int hugeInt[], int square[], int hugeIntSize, int &squareSize){

	squareSize = hugeIntSize + hugeIntSize;

	for (int i = 0; i < squareSize; i++){
		square[i] = 0;
	}

	for (int i = 0; i <= hugeIntSize; i++){
		for (int j = 0; j <= hugeIntSize; j++){
			square[i + j] += hugeInt[i] * hugeInt[j];
		}
	}

	for (int i = 0; i < squareSize; i++){
		while (square[i]>9){
			square[i] -= 10;
			square[i + 1]++;
		}
	}

	if (square[squareSize - 1] == 0){
		squareSize--;
	}

}

bool quirksome(int hugeInt[], int hugeIntSize){
	//int sum[10] = { 0 }; deleted
	int hugeInt1[arraySize] = {}; int hugeInt2[arraySize] = {}; int sum[arraySize] = {}; int square[arraySize] = {};//added
	int hugeInt1Size = 0; int hugeInt2Size = 0; int sumSize = 0; int squareSize = 0; //added
	if (hugeIntSize == 10){
		//for (int i, k = 0, int j = 5; i < 5; i++, j++){ deleted
		//sum[k] = hugeInt[i] + hugeInt[j]; deleted
		for (int i = 0; i <= 4;i++){//added
			hugeInt1[i] = hugeInt[i];//added
			hugeInt2[i] = hugeInt[i + 5];//added
		}
		hugeInt1Size = 5;//added
		hugeInt2Size = 5;//added
		//for (int i = 0; i < 11; i++){
		//	if (sum[i]>9){
		//		sum[i] -= 10;
		//		sum[i + 1]++;
		//	}
		//}
		addition(hugeInt1, hugeInt2, sum, hugeInt1Size, hugeInt2Size, sumSize);//added
		computeSquare(sum, square, sumSize, squareSize);					//added
		if (equal(square, hugeInt, squareSize, hugeIntSize)){				//added
			return true;
		}
	}
	else if (hugeIntSize == 12){											//added
		for (int i = 0; i <= 5; i++){//added
			hugeInt1[i] = hugeInt[i];//added
			hugeInt2[i] = hugeInt[i + 6];									//added
		}
		hugeInt1Size = 6;													//added
		hugeInt2Size = 6;													//added
		addition(hugeInt1, hugeInt2, sum, hugeInt1Size, hugeInt2Size, sumSize);//added
		computeSquare(sum, square, sumSize, squareSize);					//added
		if (equal(square, hugeInt, squareSize, hugeIntSize)){				//added
			return true;													//added
		}
	}

	//return false; deleted


}