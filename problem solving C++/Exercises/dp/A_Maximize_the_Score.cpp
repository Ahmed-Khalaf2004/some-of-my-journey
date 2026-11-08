#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

// input:
// 2
// 1 2 1 2
// output:
// 16
// 1 2 1 2
// 1 1 2 2

// 4
// 1 2 3 4 1 2 3 4
// 1 1 1 1 4 4 4 4
// 

// 2 3 4
// 1 1 1

// state: max length of subarrays.
    // (we need max then the we will use secound part of dp(minimize dp) not counting dp).
// transition: dp[i] = max(dp[i] - dp[])
// base case: dp[0] = 1
using namespace std;
void solve()
{
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}