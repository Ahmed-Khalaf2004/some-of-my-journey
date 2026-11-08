// #include <iostream>
// #include <vector>
// #include <algorithm>
// #include <string>

// using namespace std;
// // 2 3 5
// // 0 1 2 3 4 5 6 7 8 9 10
// // 1 0 1 1 1 3 2 5 6 8  
// // dp[i]: number of ways you can produce the n using the coins.
// // transition: dp[i] = dp[i-2] + dp[i-3] + dp[i-5];
// // transition: dp[i-v[j]]
// // base case: dp[0] = 1
// int MOD = 1e9 + 7;
// void solve()
// {
//     int n,x;
//     cin>>n>>x;
//     vector<int> v(n);    
//     for(int i= 0; i< n; i++){
//         cin>>v[i];
//     }
//     vector<int> dp(x+1);
//     dp[0] = 1;
//     for(int i=1; i<=x; i++){
//         for(int j=0; j<n; j++){
//             if(i - v[j] < 0) continue;
//             dp[i] += dp[i-v[j]];
//             dp[i]%=MOD;
//         }
//     }
//     cout<<dp[x]<<endl;
// }

// int main()
// {
//     ios_base::sync_with_stdio(false);
//     cin.tie(NULL);
//     solve();
//     return 0;
// }

#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

const int MOD = 1000000007;

int main() {
    ios::sync_with_stdio(false);
    cin.tie(nullptr);

    int n, x;
    cin >> n >> x;

    vector<int> coins(n);

    for (int i = 0; i < n; i++) {
        cin >> coins[i];
    }

    sort(coins.begin(), coins.end());

    vector<int> dp(x + 1, 0);
    dp[0] = 1;

    for (int sum = 1; sum <= x; sum++) {
        for (int coin : coins) {
            if (coin > sum) {
                break;
            }

            dp[sum] += dp[sum - coin];

            if (dp[sum] >= MOD) {
                dp[sum] -= MOD;
            }
        }
    }

    cout << dp[x] << '\n';

    return 0;
}
