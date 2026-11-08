#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
// dp[i]: how many ways to reach n.
// transition: dp[i] = dp[i-1] + dp[i-2] + .... dp[1];
// base case: dp[0] = 1
const int MAXN = 1e9 + 7;

int fib(int n){
    vector<int> dp(n+1);
    dp[0] = 1;
    for(int i = 1; i<=n; i++){
        for(int j=1; j<=6; j++){
            if((i - j) >= 0){
                dp[i] = (dp[i] + dp[i-j]) % MAXN;
            }
        }
    }
    
    return dp[n];
}
void solve()
{
    int num;
    cin>>num;
    cout<<fib(num)<<endl;
    
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}