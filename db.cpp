#include<iostream>
#include<stdlib.h>
using namespace std;
#define ll long long int

int main()
{
  for(int i=0,j=0;i<50;i++)
  {
      cout<<"INSERT INTO stocks(id,batch_no,price,no_of_medicine,exp_date) VALUES("<<i<<","<<j<<","<<rand()%150<<","<<rand()%50<<",'"<<2022+rand()%3<<"-"<<rand()%12<<"-"<<rand()%28<<"');"<<endl;
      j++;
  }
}