#include <iostream>
#include <vector>
#include <algorithm>
#define all(x) x.begin(), x.end()
using namespace std;
// // mesion: binary search until 11
// // range [1:1e7]
// // good() will take: l,r,k and ai's vector
// bool good(int l, int r, int x, vector<int> v)
// {
// }
// void solve()
// {
//     int n, k;
//     cin >> n >> k;
//     vector<int> v(k);
//     for (int i = 0; i < k; i++)
//     {
//         cin >> v[i];
//     }
//     int l(1), r(1e7);
//     while (r > l + 1)
//     {
//         int mid = (l + r) / 2;
//         if (good(l, r, mid, v))
//         {
//             r = mid;
//         }
//         else
//         {
//             l = mid;
//         }
//     }
//     int l(1), r(100);
// }
// int main()
// {
//     solve();
// }

// if((x/h)*(x/w)>=n)return 1;
// else return 0;

bool check(long long x, vector<int> &v, long long k) {
    int cnt(0);
    for (int i = 0; i < v.size(); i++) {
        cnt += v[i] / x;
    }
    return cnt >= k;
}

void solve() {
    int n, k;
    cin >> n >> k;
    vector<int> v(n);
    for (int i = 0; i < n; i++) {
        cin >> v[i];
    }
    long long l(0), r(1e9);
    while (l < r) {
        long long mid = l + (r - l) / 2;
        if (check(mid, v, k)) {
            l = mid + 1;
        }
        else {
            r = mid;
        }
    }
    cout << l << endl;
}