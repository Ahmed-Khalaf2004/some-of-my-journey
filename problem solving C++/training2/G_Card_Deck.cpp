#include <bits/stdc++.h>

using namespace std;

void Solve()
{
  int n;
  cin >> n;
  std::vector<int> v(n), pos(n + 1), ans;

  // for (int i = 0; i < n; ++i)
  // {
  //   cin>>v[i];
  //   pos[v[i]]=i;
  // }
  // int target=n;
  // while(target)
  // {
  //   for (int i = pos[target]; i < n; ++i)
  //   {
  //     if(v[i]==-1)break;
  //     ans.push_back(v[i]);
  //     v[i]=-1;
  //   }
  //   target--;
  // }
  // for(int i:ans)cout<<i<<' ';
  //   cout<<'\n';

  for (int i = 0; i < n; i++)
  {
    cin >> v[i];
    pos[v[i]] = i;
  }

  while (n)
  {
    int tar = v[n];
    for (int i = pos[tar]; i < n; i++)
    {
      if (v[i] == -1)
        continue;
      ans.push_back(v[i]);
      v[i] = -1;
    }
    n--;
  }
  for (int i : ans)
    cout << i << ' ';
  cout << '\n';
}

int main()
{

  ios_base::sync_with_stdio(0);
  cin.tie(0);
  cout.tie(0);
#ifndef ONLINE_JUDGE
  freopen("input.txt", "r", stdin);
  freopen("output.txt", "w", stdout);
#endif

  int t;
  cin >> t;
  while (t--)
  {
    Solve();
  }

  return 0;
}