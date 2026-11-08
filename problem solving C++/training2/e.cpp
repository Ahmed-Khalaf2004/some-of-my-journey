#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
// failed dp try
// state: dp[i] = max q nums.
// transition: dp[i] = dp[i-1] + dp[i-2] + .... dp[1];
// dp[0] = 0

using namespace std;
// int test(vector<int> s,int num){
//     auto l = upper_bound(s.begin(), s.end(), num);
//     long long sum =0;
//     for(int i=0; i<l - s.begin() + 1; i++){
//         sum+= s[i];
//     }
//     return sum;
// }

void solve()
{
   
    int t;
    cin>>t;
    while (t--)
    {
        int n,q;
        cin>>n>>q;
        vector<int> s(n);
        vector<int> qu(q);
        for (int i = 0; i < n; i++)
        {
            cin>>s[i];
        }
        for (int i = 0; i < q; i++)
        {
            cin>>qu[i];
            
        }


        while (q--)
        {
            int steps = upper_bound(s.begin(),s.end(),qu[q]) - s.begin() - 1;
            long long sum =0;
            for(int i=0; i<steps; i++){
                sum += s[i];
            }
            cout<<sum<<" ";
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