
#广度优先算法，先进先出
graph = {
	'A' : ['B', 'C'],
	'B' : ['A', 'C', 'D'],
	'C' : ['A', 'B', 'D', 'E'],
	'D' : ['B', 'C', 'E', 'F'],
	'E' : ['C', 'D'],
	'F' : ['D'],
}	

def BFS(graph, s):
	queue = []
	seen = set()
	seen.add(s)
	queue.append(s)
	
	while(len(queue) > 0):
		show = queue.pop(0)
		sons = graph[show]
		for w in sons:
			if w not in seen:
				queue.append(w)
				seen.add(w)
		print(show)
	
BFS(graph, 'A')