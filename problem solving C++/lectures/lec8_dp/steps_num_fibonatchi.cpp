#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
    // dp[i]: num of ways to reach this step.
    // transition: dp[i] = dp[i-1] + dp[i-2]
    // base case: dp[1] = 1
    const int MAXN = 1e5;
    vector<int> dp(MAXN,-1);
int fib(int n){
    if(n == 0 || n == 1) return 1;
    if(dp[n] != -1) return dp[n];
    dp[n] = fib(n-1) + fib(n-2);
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