#include <iostream>
#include <string>
#include <map>
#include <vector>
#include <algorithm>
using namespace std;

int main()
{
    int k;
    cin >> k;

    string s;
    cin >> s;

    map<char, int> m;
    for (char c : s)
    {
        m[c]++;
    }

    vector<pair<char, int>> vec(m.begin(), m.end());

    sort(vec.begin(), vec.end(), [](const pair<char, int> &a, const pair<char, int> &b)
         {
        if (a.second != b.second)
            return a.second > b.second;
        return a.first < b.first; });

    string res;

    for (int i = 0; i < vec.size(); i++)
    {
        char c = vec[i].first;
        int freq = vec[i].second;

        if (freq % k != 0)
        {
            cout << -1;
            return 0;
        }

        for (int j = 0; j < freq / k; j++)
        {
            res += c;
        }
    }

    for (int i = 0; i < k; i++)
    {
        cout << res;
    }

    return 0;
}
