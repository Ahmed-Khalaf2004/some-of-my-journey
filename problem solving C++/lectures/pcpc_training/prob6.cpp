#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    string str;
    cin>>str;
    // codeforce
    for (int i = 0; i < str.length(); i++)
    {
        for(int j = i; j <  str.length(); j++)
        if(str[i] != str[j]){
            char temp = str[i];
            str[i] = str[j];
            str[j] = temp;
            cout<<str<<endl;
            return;
        }
    }
        cout<<"fail"<<endl;
        return;
    
    
    
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}