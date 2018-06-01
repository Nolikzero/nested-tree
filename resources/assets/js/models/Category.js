module.exports = function Category({id, name, depth, children}) {
    this.id = id;
    this.name = name;
    this.children = children;
    this.depth = depth;
}