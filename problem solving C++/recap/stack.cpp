#include <iostream>
#include <vector>
#include <stack>

using namespace std;

void solve() {
    // input:
    int n;
    cin >> n;
    vector<int> v(n), ans(n);
    for (int i = 0; i < n; i++) {
        cin >> v[i];
    }
    
    stack<pair<int, int>> s;
    for (int i = n - 1; i >= 0; i--) {
        while (!s.empty() && s.top().first > v[i]) {
            ans[s.top().second] = i + 1;
            s.pop();
        }
        s.push({v[i], i});
    }
    
    for (int i = 0; i < n; i++) {
        cout << ans[i] << " ";
    }
    cout << endl;
}

int main() {
    ios_base::sync_with_stdio(0);
    cin.tie(NULL);
    solve();
    return 0;
}