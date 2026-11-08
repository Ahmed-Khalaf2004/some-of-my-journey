#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
// 3 11
// 1 5 7

// 0 1 2 3 4     5 6      7 8 9      10 11      12 13  
// 0 1 2 3 4     1 2      1 2 3      2  3       2  

// vector<int> dp(x+1,0) 
// vector<int> coins(n);
// int first_coin = v[0]
// dp[first_coin] = 1
// for(int i = first_coin; i<=x; i++){
//     int t = i;
//     while(t){
//     if(t>lower_bound(v[0], v[-1], t)){
//     dp[i] += 1
//     t-= lower_bound(v[0], v[-1], x)
//     if(t<0){
//          return -1
//      }
//     }}
// }
// return dp[x];

// dp[i]: the minimum num of coins to reach x.
// transition: dp[i] = 
// base case: dp[0] = 0
const int MAXN = 1e9 + 7;

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