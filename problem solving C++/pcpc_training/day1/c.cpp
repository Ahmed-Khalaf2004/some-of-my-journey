#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin>>t;
    while (t--)
    {
        int n;
        cin>>n;
        string s;
        cin>>s;
        if(s[0] == s[n-1]){
            cout<<1<<"\n";
        }else{
            bool test = false;
            int index = -1;
            for(int i=0; i<n-1; i++){
                if(s[i] != s[i+1]){
                    index = i+1;
                    break;
                }
            }
            if(index != -1){
                for(int i=index; i<n-1; i++){
                    if(s[i] != s[i+1]){
                        test = true;
                        break;
                    }
                }
            }
            
            if(test){
                cout<<1<<"\n";
            }else{
                cout<<2<<"\n";
                
            }
        }
        
       
        
        
    }
    
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}