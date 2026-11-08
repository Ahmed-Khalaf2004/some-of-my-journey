// #include<iostream>
#include<bits/stdc++.h>
 
using namespace std;
 
 
 
void Solve()
{
	int n;
	cin>>n;
	std::vector<int> a(n),res(n);
	
	for(auto& i:a)
	{
		cin>>i;
	}
	int target=n;
	while(target>0)
	{
		int indx=find(a.begin(),a.end(),target)-a.begin();
		res[target-1]=(indx+1)%target;
		int shift=indx+1;
 
		reverse(a.begin(),a.begin()+shift);
		reverse(a.begin()+shift,a.begin()+target);
		reverse(a.begin(),a.begin()+target);
 
		target--;
 
	}
	for(auto i:res)cout<<i<<' ';
		cout<<'\n';
}
 
 
int main() 
{
 
	ios_base::sync_with_stdio(0);
	cin.tie(0);cout.tie(0);
 #ifndef ONLINE_JUDGE
	freopen("input.txt","r",stdin);
	freopen("output.txt","w",stdout);
 #endif
 
	int t;
	cin>>t;
	while(t--)
	{
		Solve();
	}
 
 
 
	// Solve();
 
 
	return 0;
}