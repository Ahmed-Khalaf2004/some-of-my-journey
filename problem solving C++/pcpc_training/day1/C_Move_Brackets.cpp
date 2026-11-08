#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    // )))((((())
    int t;
    cin>>t;
    while (t--)
    {
        int n;
        cin>>n;
        string s;
        cin>>s;

        int openPrac = 0;
        int closePrac = 0;
        for(int i = 0; i<s.size(); i++){
            if(s[i] == '('){
                openPrac++;
            }else{
                if(openPrac){
                    openPrac--;
                }else{
                    closePrac++;
                }
            }
        }
        cout<<closePrac<<"\n";
    }
    
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}