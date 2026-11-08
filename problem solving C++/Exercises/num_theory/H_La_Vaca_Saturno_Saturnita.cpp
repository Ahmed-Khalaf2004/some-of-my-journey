// try one limit exceed
// #include <iostream>
// #include <vector>
// #include <algorithm>
// #include <string>
// #include <math.h>

// using namespace std;
// int func(int k, const vector<int>& v, int l, int r) {
//     int res = 0;
//     for (int i = l; i <= r; i++) {
//         while (k % v[i] == 0) {
//             k /= v[i];
//         }
//         res += k;
//     }
//     return res;
// }
// void solve() {
//     int t;
//     cin >> t;
//     while (t--) {
//         int n, q;
//         cin >> n >> q;
//         vector<int> v(n);
//         for (int i = 0; i < n; i++) {
//             cin >> v[i];
//         }

//         while (q--) {
//             int k, l, r;
//             cin >> k >> l >> r;
//             // to made index start from 0
//             l--;
//             r--;
//             cout << func(k, v, l, r) << '\n';
//         }
//     }
// }

// int main() {
//     ios_base::sync_with_stdio(false);
//     cin.tie(nullptr);
//     solve();
//     return 0;
// }

#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <math.h>

using namespace std;

const int MAXK = 100000;

void solve()
{
    int t;
    cin >> t;

    while (t--)
    {
        int n, q;
        cin >> n >> q;

        vector<int> a(n);

        vector<vector<int>> pos(MAXK + 1);

        for (int i = 0; i < n; i++)
        {
            cin >> a[i];
            pos[a[i]].push_back(i);
        }

        while (q--)
        {
            int k, l, r;
            cin >> k >> l >> r;
            --l;
            --r;
            long long ans = 0;
            int current = l;

            while (current <= r)
            {
                int nextPos = r + 1;
                int divisor = -1;
                for (int d = 2; d * d <= k; d++)
                {
                    if (k % d != 0)
                        continue;
                    if (!pos[d].empty())
                    {
                        auto it = lower_bound(
                            pos[d].begin(),
                            pos[d].end(),
                            current);

                        if (it != pos[d].end() && *it < nextPos)
                        {
                            nextPos = *it;
                            divisor = d;
                        }
                    }
                    int other = k / d;
                    if (other != d && other <= MAXK && !pos[other].empty())
                    {
                        auto it = lower_bound(
                            pos[other].begin(),
                            pos[other].end(),
                            current);

                        if (it != pos[other].end() && *it < nextPos)
                        {
                            nextPos = *it;
                            divisor = other;
                        }
                    }
                }
                if (k <= MAXK && !pos[k].empty())
                {
                    auto it = lower_bound(
                        pos[k].begin(),
                        pos[k].end(),
                        current);

                    if (it != pos[k].end() && *it < nextPos)
                    {
                        nextPos = *it;
                        divisor = k;
                    }
                }
                if (nextPos > r)
                {
                    ans += 1LL * (r - current + 1) * k;
                    break;
                }
                ans += 1LL * (nextPos - current) * k;
                while (k % a[nextPos] == 0)
                {
                    k /= a[nextPos];
                }
                ans += k;
                current = nextPos + 1;
            }

            cout << ans << '\n';
        }
    }
}

int main()
{
    ios::sync_with_stdio(false);
    cin.tie(nullptr);

    solve();
    return 0;
}