#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin >> t;

    while (t--) {
        int n, s, x;
        cin >> n >> s >> x;

        vector<int> v(n);
        int sum = 0;
        for (int i = 0; i < n; i++) {
            cin >> v[i];
            sum += v[i];
        }

        int diff = s - sum;
        if (diff >= 0 && diff % x == 0) {
            cout << "YES" << endl;
        } else {
            cout << "NO" << endl;
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