#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

// we need to git the min MEX until the vector is empty, how? MEX = the min num not at vector.
// why we just dont remove the min num each time so MEX = this each time?
// because min can repeat like this example:
// [5, 2, 1, 0, 3, 0, 4, 0]
// if we remove the 0, there is still 0 at vector so MEX will be 3
// but if we remove 1, then MEX will be 1


// we have two things to lock at: how many times each num repeat, and min num 
// and we want the min between MEX if we remove the repeated small num and MEX if we remove the grate num but less repeated
// repeat = [3, 1, 1, 0, 1, 1]
// v = [0, 0, 0, 1, 2, 4, 5] (after sort)
// dp =[3, 3, 3, 1, 2, 3, 3]  remove less MEX
// v = [0, 0, 0, 2, 4, 5]
// dp =[1, 1, 1, 1, 1, 1] remove less MEX

// state: dp[i] = MEX after remove the num.
// transition: dp[i] = if(i==0) min(dp[i], repeat[i]) else min(dp[i], set{v}[i]*repeat[i], ),
// base case: dp[0] = repeat[0]















// MEX = 3
// repeat = [3, 1, 1, 0, 1, 1]
// dp[i] = repeat[i]*set{v[i]} 
// state: dp[i] = min MEX if we remove i.
// transition = min(dp[i], MEX)
// for(int i = 0; i<n; i++){
//  for(int j = 0; j< )
//      dp[i] = min(MEX, dp[i])
// }
// #include <bits/stdc++.h>
using namespace std;

using ll = long long;

const ll INF = 4e18;

void solve() {
    int n;
    cin >> n;

    vector<ll> cnt(n + 1);

    for (int i = 0; i < n; i++) {
        int x;
        cin >> x;

        // Values greater than n cannot affect the MEX.
        if (x <= n) {
            cnt[x]++;
        }
    }

    int mex = 0;
    while (cnt[mex] > 0) {
        mex++;
    }

    vector<ll> dp(n + 1, INF);

    // Initially, the MEX is mex.
    dp[mex] = 0;

    for (int i = mex; i >= 1; i--) {
        for (int j = 0; j < i; j++) {
            dp[j] = min(
                dp[j],
                dp[i] + 1LL * i * cnt[j]
            );
        }
    }

    cout << dp[0] - mex << endl;
}

int main() {
    ios::sync_with_stdio(false);
    cin.tie(nullptr);

    int t;
    cin >> t;

    while (t--) {
        solve();
    }

    return 0;
}
