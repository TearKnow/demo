
#深度优先算法，先进后出
graph = {
	'A' : ['B', 'C'],
	'B' : ['A', 'C', 'D'],
	'C' : ['A', 'B', 'D', 'E'],
	'D' : ['B', 'C', 'E', 'F'],
	'E' : ['C', 'D'],
	'F' : ['D'],
}	

#画图，参考：https://www.youtube.com/watch?v=oLtvUWpAnTQ
def DFS(graph, s):
	stack = []
	seen = set()
	seen.add(s)
	stack.append(s)
	
	while(len(stack) > 0):
		show = stack.pop() #取最后一个
		sons = graph[show]
		for w in sons:
			if w not in seen:
				stack.append(w)
				seen.add(w)
		print(show)
	
DFS(graph, 'A')